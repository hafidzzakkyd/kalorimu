<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {
	public function index(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Full Name','trim|required|min_length[5]|max_length[21]|callback_alpha_only_space');
		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|min_length[5]|max_length[12]|callback_isUsernameExist');
		$this->form_validation->set_rules('password','Password','trim|required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword','Confirmation Password','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_isEmailExist');
		$this->form_validation->set_rules('jenkel','Jenkel','trim|required|callback_check_default');
		$this->form_validation->set_message('check_default', 'You need to select something other than the default');	

		if($this->form_validation->run()==FALSE){
			$this->load->view('register');	
		}else{
			//load model register
			$this->load->model('model_register');	
			$this->load->model('model_login');
			$this->model_register->insert();
			$valid_user = $this->model_login->check_credential();	

			$this->session->set_userdata('id', $valid_user->id);
			$this->session->set_userdata('username', $valid_user->username);
			$this->session->set_userdata('role', $valid_user->role);
			$this->session->set_userdata('nama_user', $valid_user->nama_user);
			$this->session->set_userdata('create_at', $valid_user->create_at);
			$this->session->set_userdata('foto', $valid_user->foto);

			if($valid_user->role == 2){
				$nama_user   = $this->session->userdata('nama_user');
				redirect('user/f_end_user/pilihan');
			}
		}
	}
	function check_default($post_string){
  		return $post_string == '0' ? FALSE : TRUE;
	}

	function alpha_only_space($str){
	    if (!preg_match("/^([-a-z ])+$/i", $str))
	    {
	        $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
	        return FALSE;
	    }
	    else
	    {
	        return TRUE;
	    }
	}

	public function isUsernameExist($username) {
	    $this->load->library('form_validation');
	    $this->load->model('model_register');
	    $is_exist = $this->model_register->isUsernameExist($username);

	    if ($is_exist) {
	        $this->form_validation->set_message(
	            'isUsernameExist', 'Username is already exist.'
	        );    
	        return false;
	    } else {
	        return true;
	    }
	}

	public function isEmailExist($email) {
	    $this->load->library('form_validation');
	    $this->load->model('model_register');
	    $is_exist = $this->model_register->isEmailExist($email);

	    if ($is_exist) {
	        $this->form_validation->set_message(
	            'isEmailExist', 'Email address is already exist.'
	        );    
	        return false;
	    } else {
	        return true;
	    }
	}
	//end of controller
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//load library
		$this->load->library('form_validation');
		//load modal disi
		$this->load->model('model_crud');

		if($this->session->userdata('role') != '1'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
		}

	//read data
	public function read(){	
		$data['query']=$this->model_crud->read_m();
		$this->load->view('admin/crud/crud',$data);
	}
		
	//tambah data
	public function form(){
		$this->load->view('admin/crud/add_user_form');
	}
	public function create(){
		//set validation rule
		$this->form_validation->set_rules('nama','Full Name','trim|required|min_length[5]|max_length[21]|callback_alpha_only_space');
		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|min_length[5]|max_length[12]|callback_isUsernameExist');
		$this->form_validation->set_rules('password','Password','trim|required|alpha_numeric');
		$this->form_validation->set_rules('cpassword','Confirmation Password','trim|required|matches[password]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_isEmailExist');
		$this->form_validation->set_rules('jenkel','Jenkel','trim|required|callback_check_default');
		$this->form_validation->set_rules('role','Level','required|callback_check_default');
		$this->form_validation->set_message('check_default', 'You need to select something other than the default');

		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/crud/add_user_form');	
		}else{
			$this->model_crud->create_m();	
		}
	}

	//delete data
	public function delete($id){		
		$data = array('id'=>$id);
		$this->model_crud->delete_m($data);
		redirect('admin/crud/read');
	}


	public function update($id){
		$username = $this->session->userdata('username');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Full Name','trim|required|min_length[5]|max_length[50]|callback_alpha_only_space');
		$this->form_validation->set_rules('username','Username','trim|required|alpha_numeric|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('email','Email','trim|required');
		$this->form_validation->set_rules('jenkel','Jenkel','trim|required|callback_check_default');
		$this->form_validation->set_message('check_default', 'You need to select something other than the default');

		if($this->form_validation->run()==FALSE){
			$this->load->model('model_crud');
			$data['user_id'] = $this->model_crud->find($id);
			$this->load->view('admin/crud/edit_data_form',$data);
		}else{
			$nama 		   = set_value('nama');
			$username 	   = set_value('username');
			$jenkel        = set_value('jenkel');
			$tempatlahir   = set_value('tempatlahir');
			$tgllahir      = set_value('tgllahir');
			$email    	   = set_value('email');
			$alamat    	   = set_value('alamat');
			$foto    	   = set_value('foto');
			$update_at	   = set_value('',date('Y-m-d H:i:s'));

			//upload
			$config['upload_path'] 	 = './upload/';
			$config['allowed_types'] = 'jpg';
			$config['file_name']	 = 'user-'.$username;
			$config['max_size'] 	 = '500';
			$config['overwrite'] 	 = TRUE;

			$this->load->library('upload',$config);
			$upload = $this->upload->do_upload();
			if(!$this->upload->do_upload('foto')){
				$data_user['nama_user'] 	= 	$nama;
				$data_user['username']		=	$username;
				$data_user['jenis_kelamin']	=	$jenkel;	
				$data_user['tempat_lahir']	=	$tempatlahir;
				$data_user['tgl_lahir']		=	$tgllahir;
				$data_user['email']			=	$email;
				$data_user['alamat']		=	$alamat;
				$data_user['update_at']		=	$update_at;

				$this->load->model('model_crud');
				$this->model_crud->update($id, $data_user);
			}else{
				$foto = $this->upload->data();
				//end of upload
				$data_user['nama_user'] 	= 	$nama;
				$data_user['username']		=	$username;
				$data_user['jenis_kelamin']	=	$jenkel;	
				$data_user['tempat_lahir']	=	$tempatlahir;
				$data_user['tgl_lahir']		=	$tgllahir;
				$data_user['email']			=	$email;
				$data_user['alamat']		=	$alamat;
				$data_user['foto']			=	$foto['file_name'];
				$data_user['update_at']		=	$update_at;

				$this->load->model('model_crud');
				$this->model_crud->update($id, $data_user);
			}
		}
	}

	//form validation
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

	public function update_password($id){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password','Password','trim|required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword','Confirmation Password','trim|required');
		
		if($this->form_validation->run()==FALSE){
			$this->load->model('model_crud');
			$data['password_user'] = $this->model_crud->find($id);
			$this->load->view('admin/crud/edit_password_admin', $data);
		}else{
			$password 	=	set_value('password');
			$update_at	=	set_value('',date('Y-m-d H:i:s'));

			$data_password['password']	=	md5($password);
			$data_password['update_at']	=	$update_at;

			$this->load->model('model_crud');
			$this->model_crud->update_password_user_m($id, $data_password);
			redirect('admin/crud/update/'.$id);
		}
	}	
	//end of class
}


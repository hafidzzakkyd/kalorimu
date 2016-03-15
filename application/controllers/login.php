<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('login');	
		}else{
			//load model user
			$this->load->model('model_login');
			$valid_user = $this->model_login->check_credential();

			if($valid_user == FALSE){
				$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Salah Kombinasi Username dan Password! <i class="glyphicon glyphicon-warning-sign"></i></div>');
				redirect('login');
			}else{
				//if password and username true

				$this->session->set_userdata('id', $valid_user->id);
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('role', $valid_user->role);
				$this->session->set_userdata('nama_user', $valid_user->nama_user);
				$this->session->set_userdata('create_at', $valid_user->create_at);
				$this->session->set_userdata('foto', $valid_user->foto);

				switch ($valid_user->role) {
					case '1': //admin
						$this->session->set_flashdata('sukses','<div class="text-center alert alert-success fade in animated bounceInDown noborder">Hallo, Selamat Datang Kembali <b>'.$valid_user->nama_user.'!</b><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
						redirect('home'); //redirect ke controller admin
						break;
					case '2': //member $this->session->set_flashdata('sukses','<div class="col-md-8 col-md-offset-2 text-center alert alert-success fade in animated bounceInDown"> Hallo, Selamat Datang Kembali <b>User!</b><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
						$nama_user   = $this->session->userdata('nama_user');
						$this->session->set_flashdata('sukses','<div class="col-md-8 col-md-offset-2 text-center alert alert-success fade in animated bounceInDown">Hallo, Selamat Datang Kembali <b>'.$valid_user->nama_user.'!</b><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
						redirect('user/f_end_user/pilihan');
						break;	
					
					default: //do nothing
						break;
				}
			}
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	//end of class
}

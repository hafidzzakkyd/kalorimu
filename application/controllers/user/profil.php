<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil extends CI_Controller {

		public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '2'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
		}

		public function index(){
			$this->load->model('model_profil');
			$data['profil']=$this->model_profil->read_p_m();
			$this->load->view('user/profil',$data);
		}
	}



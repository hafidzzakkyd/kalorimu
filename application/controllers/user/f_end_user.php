<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class f_end_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '2'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
	}

	public function pilihan(){
		$id = $this->session->userdata('id');
		$this->load->model('model_pilihan');
		$isExist = $this->model_pilihan->isIdExist();
		if($isExist){
			$this->load->model('model_last_kalori');
			$this->load->model('model_lihat_kalori');
			$this->load->model('model_tips_kalori');
			$data['last'] = $this->model_last_kalori->last_m();
			$data['chart_user']=$this->model_lihat_kalori->read_kalori_m();
			$data['tips_kalori']=$this->model_tips_kalori->lihat_tips_m();
			$this->load->view('user/front_end_user', $data);
		}else{
			$this->load->view('user/mulai');
		}
	}
	//end of controller
}
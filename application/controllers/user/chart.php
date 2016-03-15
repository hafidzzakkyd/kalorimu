<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class chart extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '2'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
	}
	
	public function read_chart(){
		$this->load->model('model_lihat_kalori');
		$data['chart_user']=$this->model_lihat_kalori->read_kalori_m();
		$this->load->view('user/chart',$data);
	}


//end of controller
}
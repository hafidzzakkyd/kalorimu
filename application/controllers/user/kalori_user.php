<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kalori_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '2'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
	}

	public function index(){
		$this->load->view('user/hitung_kalori');
	}

	public function hitung_kalori(){
		//set form validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('jenkel','Jenis Kelamin','required');
		$this->form_validation->set_rules('bb','Berat Badan','required');
		$this->form_validation->set_rules('tb','Tinggi Badan','required');
		$this->form_validation->set_rules('aktifitas','Aktifitas','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('jenkel','Jenkel','required|callback_check_default');
		$this->form_validation->set_rules('aktifitas','Jenkel','required|callback_check_default');
		$this->form_validation->set_message('check_default', 'You need to select something other than the default');	

		if($this->form_validation->run()==FALSE){
			$this->load->view('user/hitung_kalori');	
		}else{
			$this->load->model('model_kalori_user');
			$this->model_kalori_user->hitung_kalori_m();	
		}
	}

	//public function lihat_kalori(){
		//$this->load->model('model_kalori_user');
		//$data['test'] = $this->model_kalori_user->hitung_kalori_m();
		//$this->load->view('user/hitung_kalori',$data);
	//}


	function check_default($post_string){
  		return $post_string == '0' ? FALSE : TRUE;
	}
	//end of controller
}

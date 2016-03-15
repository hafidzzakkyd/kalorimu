<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '1'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
		}

	public function index(){
		$this->load->model('model_beranda');
		$this->load->model('model_last_kalori');
		$data['jumlah'] = $this->model_beranda->count_user();
		$data['tips'] = $this->model_beranda->count_tips();
		$data['register'] = $this->model_beranda->user_bulan();
		$data['best'] = $this->model_beranda->best_user();
		$this->load->view('admin/home',$data);
	}
}

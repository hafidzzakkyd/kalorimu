<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tips_kalori extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '1'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
		}

	public function tips(){
		$this->load->model('model_tips_kalori');
		$data['tips_kalori'] = $this->model_tips_kalori->lihat_tips_m();
		$this->load->view('admin/tips/tips_kalori',$data);
	}

	public function form(){
		$this->load->view('admin/tips/add_tips_form');
	}

	public function add_tips(){
		//set validation rule
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul','Judul','trim|required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('informasi','Informasi','trim|required');
		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/tips/add_tips_form');	
		}else{
			$this->load->model('model_tips_kalori');
			$this->model_tips_kalori->create_tips_m();	
		}
	}

	public function delete_tips($id){		
		$data = array('id'=>$id);
		$this->load->model('model_tips_kalori');
		$this->model_tips_kalori->delete_m($data);
		redirect('admin/tips_kalori/tips');
	}

	public function update_tips($id){
		//set validation rule
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul','Judul','trim|required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('informasi','Informasi','trim|required');

		if($this->form_validation->run()==FALSE){
			$this->load->model('model_tips_kalori');
			$data['tips_update'] = $this->model_tips_kalori->find($id);
			$this->load->view('admin/tips/edit_tips_form',$data);
		}else{
			$judul    	   = set_value('judul');
			$informasi     = set_value('informasi');
			$create_at	   = set_value('',date('Y-m-d H:i:s'));

			$data_tips['judul']			=	$judul;
			$data_tips['info']		=	$informasi;
			$data_tips['create_at']		=	$create_at;

			$this->load->model('model_tips_kalori');
			$this->model_tips_kalori->update_tips($id, $data_tips);
			redirect('admin/tips_kalori/tips');
		}	
	}	
//end of controller	
}
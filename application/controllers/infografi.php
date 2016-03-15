<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class infografi extends CI_Controller {

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
			$this->load->view('infografik/kalkulator');	
		}else{
			$this->load->model('model_infografik');
			$data['content'] = $this->model_infografik->hitung_kalori_m();	
			$this->load->view('infografik/kalkulator',$data);
		}
	}

	function check_default($post_string){
  		return $post_string == '0' ? FALSE : TRUE;
	}
}

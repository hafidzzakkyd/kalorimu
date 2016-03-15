<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class info_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role') != '1'){
			$this->session->set_flashdata('error','<div class="alert alert-danger text-center"><i class="glyphicon glyphicon-warning-sign"></i> Kamu Belum Login! <i class="glyphicon glyphicon-warning-sign"></i></div>');
			redirect('login');
			}
		}

	public function info($id){
			$this->load->model('model_infouser');
			$data['info_user']=$this->model_infouser->find($id);
			$data['kalori_user']=$this->model_infouser->find_kalori_m($id);
			$this->load->view('admin/infouser/infouser',$data);
	}

	function check_default($post_string){
  		return $post_string == '0' ? FALSE : TRUE;
	}

	public function add_kalori_user($id){
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
			$this->load->model('model_infouser');
			$data['id_user'] = $this->model_infouser->find($id);
			$this->load->view('admin/infouser/tambah_kalori',$data);	
		}else{
			$this->load->model('model_infouser');
			$this->model_infouser->add_kalori_m($id);	
		}
	}

	public function delete_kalori_user($id){
		$id_kalori	= array('id_kalori'=>$id);
		$this->load->model('model_infouser');
		$this->model_infouser->delete_kalori_m($id_kalori);
		redirect('admin/crud/read');
	}

	public function update_kalori_user($id){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('umur','Umur','required');
		$this->form_validation->set_rules('bb','Berat Badan','required');
		$this->form_validation->set_rules('tb','Tinggi Badan','required');
		$this->form_validation->set_rules('jenkel','Jenkel','required|callback_check_default');
		$this->form_validation->set_rules('aktifitas','Level Aktifitas','required|callback_check_default');
		$this->form_validation->set_rules('tanggal','Tanggal','required|callback_check_default');
		$this->form_validation->set_message('check_default', 'You need to select something other than the default');

		if($this->form_validation->run()==FALSE){
			$this->load->model('model_lihat_kalori');
			$data['kalori_edit'] = $this->model_lihat_kalori->find($id);
			$this->load->view('admin/infouser/edit_kalori',$data);
		}else{
			$umur 		   = set_value('umur');
			$jenkel        = set_value('jenkel');
			$bb 		   = set_value('bb');
			$tb 		   = set_value('tb');
			$tanggal   	   = set_value('tanggal');
			$aktifitas 	   = set_value('aktifitas');
			$update_at	   = set_value('',date('Y-m-d H:i:s'));

			if($jenkel == 'pria'){
				switch ($aktifitas) {
					case '1':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 66.4730 + (13.7516*$bb) + (5.0033*$tb) - (6.7550*$umur);	
						$kalori = $hasil*1.2;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					case '2':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 66.4730 + (13.7516*$bb) + (5.0033*$tb) - (6.7550*$umur);	
						$kalori = $hasil*1.375;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					case '3':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 66.4730 + (13.7516*$bb) + (5.0033*$tb) - (6.7550*$umur);	
						$kalori = $hasil*1.55;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					case '4':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 66.4730 + (13.7516*$bb) + (5.0033*$tb) - (6.7550*$umur);	
						$kalori = $hasil*1.725;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;	

					case '5':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 66.4730 + (13.7516*$bb) + (5.0033*$tb) - (6.7550*$umur);	
						$kalori = $hasil*1.9;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					default:
						# code...
						break;
				}	
			}else if($jenkel == 'wanita'){
				switch ($aktifitas) {
					case '1':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 655.0955 + (9.5634*$bb) + (1.8496*$tb) - (4.6756*$umur);
						$kalori = $hasil*1.2;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					case '2':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 655.0955 + (9.5634*$bb) + (1.8496*$tb) - (4.6756*$umur);
						$kalori = $hasil*1.375;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					case '3':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 655.0955 + (9.5634*$bb) + (1.8496*$tb) - (4.6756*$umur);
						$kalori = $hasil*1.55;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					case '4':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 655.0955 + (9.5634*$bb) + (1.8496*$tb) - (4.6756*$umur);
						$kalori = $hasil*1.725;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;	

					case '5':
						echo "Jenis Kelamin : ".$jenkel;
						$hasil = 655.0955 + (9.5634*$bb) + (1.8496*$tb) - (4.6756*$umur);
						$kalori = $hasil*1.9;
						echo "<br/> Hasil BMR : ".$hasil,"<br/>"; 	
						echo "Kalori Perhari : ".$kalori,"<br/>"; 	
						break;

					default:
						# code...
						break;
				}				
			}else{
				echo "Kelaminmu Apa??";
			}

			$BMI = ($bb)/(($tb/100)*($tb/100));
			if($umur > 16){
				if($BMI < 16.5){
					$kategori = set_value('','Berat Badan Sangat Kurang');
				}
				else if($BMI < 18.5){
					$kategori = set_value('','Berat Badan Kurang');	
				}
				else if($BMI < 25){
					$kategori = set_value('','Normal');	
				}
				else if($BMI < 30){
					$kategori = set_value('','Berat Badan Berlebih');	
				}else{
					$kategori = set_value('','Obesitas');	
				}
			}

			$kalori_user = $kalori;
			$id_user	 = $this->session->userdata('id');

			$data_kalori['tinggi_badan'] = $tb;
			$data_kalori['berat_badan']  = $bb;
			$data_kalori['kalori_user']  = $kalori_user;
			$data_kalori['bmi'] 			 = $BMI;
			$data_kalori['bmr'] 			 = $hasil;
			$data_kalori['status'] 	     = $kategori;
			$data_kalori['waktu']	     = $tanggal;
			$data_kalori['kal_usr_update']  = $update_at;

			$data_kalori2['umur']		=	$umur;

			$this->load->model('model_infouser');
			$this->model_infouser->update_kalori_umur_m($id_user, $data_kalori2);
			$this->model_infouser->update_kalori_m($id, $data_kalori);
			
			redirect('admin/crud/read');
		}
	}	
//end of controller		
}
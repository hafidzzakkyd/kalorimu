<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class model_kalori_user extends CI_Model {

		public function hitung_kalori_m(){
			$bb = set_value('bb');
			echo "<br/>","Berat Badan : ".$bb,"<br/>"; 
			$tb = set_value('tb');
			echo "Tinggi Badan : ".$tb,"<br/>"; 
			$umur = set_value('umur');
			echo "Umur : ".$umur,"<br/>";
			$jenkel = set_value('jenkel');
			$aktifitas = set_value('aktifitas');
			echo "aktifitas : ".$aktifitas,"<br/>";

			if($jenkel == '1'){
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
			}else if($jenkel == '2'){
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

			$id 	    = $this->session->userdata('id');
			$kalori_usr = $kalori;
			$tanggal	= set_value('tanggal');
			$create_at	= set_value('',date('Y-m-d H:i:s'));

			$data['id_user'] 	 	 = $id;
			$data['berat_badan'] 	 = $bb;
			$data['tinggi_badan']	 = $tb;
			$data['kalori_user'] 	 = $kalori_usr;
			$data['bmi'] 			 = $BMI;
			$data['bmr'] 			 = $hasil;
			$data['status'] 	     = $kategori;
			$data['waktu'] 		 	 = $tanggal;
			$data['kal_usr_create']   = $create_at;

			$input = $this->db->insert('tb_kalori_user',$data);
			/*if($input==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Kalori Anda Berhasil Diinput<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('user/lihat_kalori/read_kalori');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Kalori Anda Gagal Diinput! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('user/lihat_kalori/read_kalori');
			}*/
			redirect('user/lihat_kalori/hasil');
		}
	//end of model
	}
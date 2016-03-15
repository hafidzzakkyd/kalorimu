<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_infouser extends CI_Model {

	//info user crud
	public function read_m(){
		$this->db->select('*');
		$this->db->from('tb_user a');
		$this->db->join('tb_user_role b','a.role = b.id_role','left');
		$this->db->join('tb_jenkel c','a.jenis_kelamin = c.id_jenkel','left');
		$this->db->order_by('a.role','asc');
		$query = $this->db->get();
		return $query;
	}
	//info kalori user
	public function info_kalori_user($id){
		$this->db->select('*');
		$this->db->from('tb_kalori_user a');
		$this->db->join('tb_user b','a.id_user=b.id','left');
		$this->db->where('id_user', $id);
		$this->db->order_by('a.waktu','desc');
		$query = $this->db->get();
		return $query;
	}


	public function find($id){
			//Query mencari record berdasarkan ID-nya
		$this->db->select('*');
		$this->db->from('tb_user a');
		$this->db->join('tb_user_role b','b.id_role = a.role','left');
		$this->db->join('tb_jenkel c','c.id_jenkel = a.jenis_kelamin','left');
		$this->db->where('id', $id);
		$hasil = $this->db->get();

		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function find_kalori_m($id){
		$this->db->select('*');
		$this->db->from('tb_kalori_user');
		$this->db->where('id_user', $id);
		$this->db->order_by('tb_kalori_user.waktu','asc');
		$query = $this->db->get();
		return $query->result();
	}

	//delete kalori
	public function delete_kalori_m($id_kalori){	
		$delete = $this->db->delete('tb_kalori_user',$id_kalori);
		if($delete==TRUE){
			$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Kalori Berhasil Dihapus<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('admin/crud/read');
		}else{
			$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Kalori Gagal Dihapus! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('admin/crud/read');
		}
	}

	public function update_kalori_m($id, $data_kalori){
		$update_kalori_m = $this->db->where('id_kalori', $id)
					  	     	    ->update('tb_kalori_user', $data_kalori);
		if($update_kalori_m==TRUE){
			$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Kalori Anda Berhasil Diupdate<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('admin/crud/read');
		}else{
			$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Kalori Anda Gagal Diupdate! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('admin/crud/read');
		}			  	     	    
	}

	public function update_kalori_umur_m($id, $data_kalori2){
		$this->db->where('id', $id)
				 ->update('tb_user', $data_kalori2);
	}

	public function add_kalori_m($id){
		$bb = set_value('bb');
		echo "<br/>","Berat Badan : ".$bb,"<br/>"; 
		$tb = set_value('tb');
		echo "Tinggi Badan : ".$tb,"<br/>"; 
		$umur = set_value('umur');
		echo "Umur : ".$umur,"<br/>";
		$jenkel = set_value('jenkel');
		$aktifitas = set_value('aktifitas');
		echo "aktifitas : ".$aktifitas,"<br/>";

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

		$kalori_usr = $kalori;
		$tanggal	= set_value('tanggal');
		$create_at	= set_value('',date('Y-m-d H:i:s'));

		$data['id_user'] 	 	 = $id;
		$data['berat_badan'] 	 = $bb;
		$data['tinggi_badan']	 = $tb;
		$data['kalori_user'] = $kalori_usr;
		$data['bmi'] 			 = $BMI;
		$data['bmr'] 			 = $hasil;
		$data['status'] 	     = $kategori;
		$data['waktu'] 		 = $tanggal;
		$data['kal_usr_create']   = $create_at;

		$input = $this->db->insert('tb_kalori_user',$data);
		if($input==TRUE){
			$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Kalori Anda Berhasil Diinput<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('admin/info_user/info/'.$id);
		}else{
			$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Kalori Anda Gagal Diinput! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('user/lihat_kalori/read_kalori');
		}
		redirect('admin/info_user/info/'.$id);
	}

//end of model		
}
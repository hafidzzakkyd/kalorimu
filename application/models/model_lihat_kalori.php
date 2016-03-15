<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_lihat_kalori extends CI_Model {

	public function read_kalori_m(){
		$id 	    = $this->session->userdata('id');
		$this->db->select('*');
		$this->db->from('tb_kalori_user');
		$this->db->where('id_user', $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function delete_kalori_m($data){	
		$delete = $this->db->delete('tb_kalori_user',$data);
		if($delete==TRUE){
			$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Data Berhasil Dihapus<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('user/lihat_kalori/read_kalori');
		}else{
			$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Data Gagal Dihapus! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
			redirect('user/lihat_kalori/read_kalori');
		}
	}
	public function find($id){
		//Query mencari record berdasarkan ID-nya
			$this->db->select('*');
			$this->db->from('tb_kalori_user a');
			$this->db->join('tb_user b','a.id_user = b.id','left');
			$this->db->where('id_kalori', $id);
			$hasil = $this->db->get();
			
			if($hasil->num_rows() > 0){
				return $hasil->row();
			} else {
				return array();
			}
		}

	public function update_kalori_m($id, $data_kalori){
			$update_kalori_m = $this->db->where('id_kalori', $id)
						  	     	    ->update('tb_kalori_user', $data_kalori);
			redirect('user/lihat_kalori/hasil');			  	     	    
		}

	public function update_kalori_umur_m($id, $data_kalori2){
			$this->db->where('id', $id)
					 ->update('tb_user', $data_kalori2);
		}	
	//end of model
}
	
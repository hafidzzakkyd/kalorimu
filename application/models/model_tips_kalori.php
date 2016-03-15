<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class model_tips_kalori extends CI_Model {

		public function lihat_tips_m(){
			$this->db->select('*');
			$this->db->from('tb_informasi');
			$query = $this->db->get();
			return $query->result();
		}

		public function create_tips_m(){
			$judul 		   = set_value('judul');
			$informasi 	   = set_value('informasi');
			$create_at	   = set_value('',date('Y-m-d H:i:s'));

			$data['judul'] 		= $judul;
			$data['info'] 		= $informasi;
			$data['create_at'] 	= $create_at;

			$this->db->insert('tb_informasi	',$data);
			redirect('admin/tips_kalori/tips');			
		}

		public function delete_m($data){
			$delete = $this->db->delete('tb_informasi',$data);
			if($delete==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Data Berhasil Dihapus<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/tips_kalori/tips');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Data Gagal Dihapus! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/tips_kalori/tips');
			} 
		}

		public function find($id){
		//Query mencari record berdasarkan ID-nya
			$hasil = $this->db->where('id', $id)
							  ->limit(1)
							  ->get('tb_informasi');
			if($hasil->num_rows() > 0){
				return $hasil->row();
			} else {
				return array();
			}
		}

		public function update_tips($id, $data_tips){
			$update = $this->db->where('id', $id)
					 		   ->update('tb_informasi', $data_tips);
			if($update==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Data Berhasil Diupdate<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/tips_kalori/tips');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Data Gagal Diupdate! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/tips_kalori/tips');
			}
		}

		public function export_tips_m(){
			$this->db->select('*');
			$this->db->from('tb_informasi');
			$query = $this->db->get();
			return $query;
		}
//end of model
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class model_edit_profil_admin extends CI_Model {

		
		//find id
		public function find($id){
		//Query mencari record berdasarkan ID-nya
			$hasil = $this->db->where('id', $id)
							  ->limit(1)
							  ->get('tb_user');
			if($hasil->num_rows() > 0){
				return $hasil->row();
			} else {
				return array();
			}
		}

		public function update_profil_m($id, $data_user){
			$update_profil_m = $this->db->where('id', $id)
					 					->update('tb_user', $data_user);

			if($update_profil_m==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Profil Berhasil Diupdate<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/profil');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Profil Gagal Diupdate! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/profil');
			}
		}

		public function update_password_m($id, $data_password){
			$update_password_m = $this->db->where('id', $id)
					 					  ->update('tb_user', $data_password);

			if($update_password_m==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Password Berhasil Diubah<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/profil');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Password Gagal Diubah! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/profil');
			}		 
		}

		public function update_password_user_m($id, $data_password){
			$update_password_m = $this->db->where('id', $id)
					 					  ->update('tb_user', $data_password);

			if($update_password_m==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Password Berhasil Diubah<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/crud/update/'.$id);
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Password Gagal Diubah! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/crud/update/'.$id);
			}		 
		}
	}

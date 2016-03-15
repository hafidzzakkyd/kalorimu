<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class model_crud extends CI_Model {

		//read
		public function read_m(){
			$this->db->select('*');
			$this->db->from('tb_user a');
			$this->db->join('tb_user_role b','a.role = b.id_role','left');
			$this->db->join('tb_jenkel c','a.jenis_kelamin = c.id_jenkel','left');
			$this->db->order_by('a.role','asc');
			$query = $this->db->get();
			return $query->result();
		}

		//create
		public function create_m(){
			$name 		   = set_value('nama');
			$username 	   = set_value('username');
			$password 	   = set_value('password');
			$jenkel        = set_value('jenkel');
			$tempatlahir   = set_value('tempatlahir');
			$tgllahir      = set_value('tgllahir');
			$email    	   = set_value('email');
			$alamat    	   = set_value('alamat');
			$role     	   = set_value('role');
			$foto		   = set_value('','default.jpg');
			$create_at	   = set_value('',date('Y-m-d H:i:s'));

			$data['nama_user'] 		= $name;
			$data['username'] 		= $username;
			$data['password'] 		= md5($password);
			$data['jenis_kelamin'] 	= $jenkel;
			$data['tempat_lahir'] 	= $tempatlahir;
			$data['tgl_lahir'] 		= $tgllahir;
			$data['email'] 			= $email;
			$data['alamat']			= $alamat;
			$data['role']			= $role;
			$data['foto']			= $foto;
			$data['create_at'] 		= $create_at;

			$this->db->insert('tb_user',$data);
			redirect('admin/crud/read');
		}
		//delete
		public function delete_m($data){
			$delete = $this->db->delete('tb_user',$data);
			if($delete==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Data Berhasil Dihapus<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/crud/read');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Data Gagal Dihapus! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/crud/read');
			} 
		}
		
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

		public function update($id, $data_user){
			$update = $this->db->where('id', $id)
					 		   ->update('tb_user', $data_user);
			if($update==TRUE){
				$this->session->set_flashdata('sukses','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-ok"></i> Data Berhasil Diupdate<a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/crud/read');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-success fade in"><i class="glyphicon glyphicon-warning-sign"></i> Data Gagal Diupdate! <i class="glyphicon glyphicon-warning-sign"></i><a href="#" class="close" style="text-decoration : none;" data-dismiss="alert" aria-label="close">&times;</a></div>');
				redirect('admin/crud/read');
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
	//end of model	
	}
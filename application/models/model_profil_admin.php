<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_profil_admin extends CI_Model {

		public function read_p_m(){
			$id 	    = $this->session->userdata('id');
			$this->db->select('*');
			$this->db->from('tb_user a');
			$this->db->join('tb_jenkel b','a.jenis_kelamin = b.id_jenkel','left');
			$this->db->where('id', $id);
			$profil = $this->db->get();
			return $profil->row();
		}
}
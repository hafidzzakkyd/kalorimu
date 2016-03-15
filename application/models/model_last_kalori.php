<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class model_last_kalori extends CI_Model {

		public function last_m(){
			$id = $this->session->userdata('id');
			$this->db->select('*');
			$this->db->from('tb_kalori_user');
			$this->db->where('id_user', $id);
			$this->db->order_by('tb_kalori_user.waktu','desc');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->row();
		}
		//end of model
	}
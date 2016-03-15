<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class model_beranda extends CI_Model {

		public function user_bulan(){
			$this->db->select('*');
			$this->db->from('tb_user');
			$this->db->where('month(create_at)',date('m'));
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function count_user(){
			$this->db->select('*');
			$this->db->from('tb_user');
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function count_tips(){
			$this->db->select('*');
			$this->db->from('tb_informasi');
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function read_m(){
			$this->db->select('id_user,count(id_user)');
			$this->db->from('tb_kalori_user');
			$this->db->group_by('id_user');
			$query = $this->db->get();
			return $query->result();
		}
		public function best_user(){
			$this->db->select('username, id_user, COUNT(id_user) as total');
			$this->db->from('tb_kalori_user a');
			$this->db->join('tb_user b','a.id_user = b.id','left');
			$this->db->group_by('id_user');
			$this->db->order_by('total','desc');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query->result();
		}
	}

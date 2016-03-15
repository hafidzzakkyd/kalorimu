<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pilihan extends CI_Model {

	function isIdExist() {
		$id = $this->session->userdata('id');
	    $this->db->select('id_user');
	    $this->db->where('id_user', $id);
	    $query = $this->db->get('tb_kalori_user');

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
    }
}
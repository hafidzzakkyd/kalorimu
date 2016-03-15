<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_register extends CI_Model {
	public function insert(){
		$name	  = set_value('nama');
		$username = set_value('username');
		$password = set_value('password');
		$jenkel   = set_value('jenkel');
		$email    = set_value('email');
		$tempatlahir    = set_value('tempatlahir');
		$tgllahir		= set_value('tgllahir');
		$alamat			= set_value('alamat');
		$role     = set_value('','2');
		$create_at= set_value('',date('Y-m-d H:i:s'));
		$foto     = set_value('','default.jpg');
		
		$data['nama_user'] = $name;
		$data['username'] = $username;
		$data['password'] = md5($password);
		$data['jenis_kelamin'] = $jenkel;
		$data['email'] = $email;
		$data['tempat_lahir'] = $tempatlahir;
		$data['tgl_lahir'] = $tgllahir;
		$data['alamat'] = $alamat;
		$data['role'] = $role;
		$data['create_at'] = $create_at;
		$data['foto'] = $foto;

		$input = $this->db->insert('tb_user',$data);
	}

	function isUsernameExist($username) {
	    $this->db->select('id');
	    $this->db->where('username', $username);
	    $query = $this->db->get('tb_user');

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
    }

	function isEmailExist($email) {
	    $this->db->select('id');
	    $this->db->where('email', $email);
	    $query = $this->db->get('tb_user');

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}
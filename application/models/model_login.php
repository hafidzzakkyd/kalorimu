<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_login extends CI_Model {


	public function check_credential(){
		
		$username = set_value('username');
		$password = set_value('password');

		$hasil = $this->db->where('username', $username)
						  ->where('password', md5($password))
						  ->limit(1)
						  ->get('tb_user');	  


		if($hasil->num_rows() > 0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	//end of model
}
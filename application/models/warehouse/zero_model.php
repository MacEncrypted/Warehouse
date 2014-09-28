<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Zero_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function zeroAll() {
		$marker = $this->session->userdata('user_login') . ' ' . time();
		$this->db->query("INSERT INTO log_history (id,date,id_user,action,amount,id_product,id_packing) SELECT id,date,id_user,action,amount,id_product,id_packing FROM log");		
		$this->db->query("UPDATE log_history SET info='$marker' WHERE info=''");
		$this->db->query("DELETE FROM log");
	}
	
	public function zeroPro() {
		$this->db->query("UPDATE products SET deleted='1'");
	}
}

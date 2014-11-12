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

	public function zeroDesc($desc, $action) {
		$marker = $this->session->userdata('user_login') . ' ' . time();
		//$this->db->query("INSERT INTO log_history (id,date,id_user,action,amount,id_product,id_packing) SELECT log.id,log.date,log.id_user,log.action,log.amount,log.id_product,log.id_packing FROM log JOIN products ON products.id=log.id_product WHERE products.description='$desc'");		
		$this->db->query("UPDATE log_history SET info='$marker' WHERE info=''");
		$ids = $this->getIds("SELECT log.id FROM log JOIN products ON products.id=log.id_product WHERE products.description='$desc' AND log.action='$action'");
		if ($ids != '') {
			$this->db->query("DELETE FROM log WHERE log.id IN ($ids)");
			return true;
		} else {
			return false;
		}
	}

	public function getIds($query_string) {
		$query = $this->db->query($query_string);

		$ids = '';

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$ids .= $row->id . ', ';
			}
		}

		return rtrim($ids, ', ');
	}

}

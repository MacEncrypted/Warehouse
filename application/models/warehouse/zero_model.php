<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Zero_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->model('warehouse/log_model');
	}

	public function zeroAll() {
		$marker = $this->session->userdata('user_login') . ' ' . time();
		$this->db->query("INSERT INTO log_history (date,id_user,action,amount,id_product,id_packing) SELECT date,id_user,action,amount,id_product,id_packing FROM log");
		$this->db->query("UPDATE log_history SET info='$marker' WHERE info=''");
		$this->db->query("DELETE FROM log");
	}

	public function zeroPro() {
		$this->db->query("UPDATE products SET deleted='1'");
	}

	public function zeroDesc($desc, $action) {
		$marker = $this->session->userdata('user_login') . ' ' . time();
		$ids = $this->getIds("SELECT log.id FROM log JOIN products ON products.id=log.id_product WHERE products.description='$desc' AND log.action='$action'");
		if ($ids != '') {
			$this->db->query("INSERT INTO log_history (date,id_user,action,amount,id_product,id_packing) SELECT log.date,log.id_user,log.action,log.amount,log.id_product,log.id_packing FROM log JOIN products ON products.id=log.id_product WHERE log.id IN ($ids)");
			$this->db->query("UPDATE log_history SET info='$marker' WHERE info=''");		
			$this->db->query("DELETE FROM log WHERE log.id IN ($ids)");
		}
		$this->addToZero($desc);
		return true;
	}

	public function addToZero($desc) {
		$orders = $this->log_model->getOrderList(1);
		foreach	($orders as $order) {
			if ($order['desc'] == $desc) {
				$this->log_model->addAction($order['id'], (0 - $order['sum']), 1);
			}
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

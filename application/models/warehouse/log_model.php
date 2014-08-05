<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Log_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function addAction($id_product, $amount, $action) {
		$id_user = $this->session->userdata('user_id');
		$this->db->query("INSERT INTO log (id_user, action, amount, id_product) "
				. "VALUES ('$id_user', '$action', '$amount', '$id_product')");
	}
	
	public function getStatusList() {
		$query = $this->db->query("SELECT "
				. "products.id AS id, "
				. "products.name AS name, "
				. "products.description AS description, "
				. "counter.sum AS sum "
				. "FROM products JOIN (SELECT id_product, sum(amount) AS sum FROM `log` GROUP BY 1 ORDER BY 2) AS counter "
				. "ON products.id=counter.id_product WHERE products.deleted='0' ORDER BY id");

		$products = array();

		if ($query->num_rows() > 0) {
			
			foreach ($query->result() as $row) {
				$product = array();
				$product['id'] = $row->id;
				$product['name'] = $row->name;
				$product['desc'] = $row->description;
				$product['sum'] = $row->sum;
				$products[] = $product;
			}
		}
		
		return $products;
	}
	
	public function getReports($start, $end) {
				
		$starts = date("Y-m-d H:i:s", strtotime($start));
		$ends = date("Y-m-d H:i:s", strtotime($end));
				
		$reports = array();
		$this->load->model('warehouse/library_model');
		$products = $this->library_model->getList();
		
		foreach ($products as $product) {
			$id = $product['id'];
			$report = array();
			
			$query = $this->db->query("SELECT "
					. "products.id AS pid, "
					. "products.name AS pname, "
					. "log.date AS date, "
					. "users.id AS uid, "
					. "users.login AS login, "
					. "log.action AS action, "
					. "log.amount AS amount "
					. "FROM log "
					. "JOIN products ON log.id_product=products.id "
					. "JOIN users ON log.id_user=users.id "
					. "WHERE id_product='$id' AND (date BETWEEN '$starts' AND '$ends')");

				if ($query->num_rows() > 0) {

					foreach ($query->result() as $row) {
						$log = array();
						$log['pid'] = $row->pid;
						$log['pname'] = $row->pname;
						$log['date'] = $row->date;
						$log['uid'] = $row->uid;
						$log['login'] = $row->login;
						$log['action'] = $row->action;
						$log['amount'] = $row->amount;
						$report[] = $log;
					}
				}
			
			
			$reports[$id] = $report;
		}
		
		return $reports;
	}
}

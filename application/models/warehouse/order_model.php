<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Order_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList() {
		$query = $this->db->query("SELECT * FROM orders WHERE deleted='0'");

		$products = array();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$product = array();
				$product['id'] = $row->id;
				$product['name'] = $row->name;
				$product['desc'] = $row->description;
				$products[] = $product;
			}
		}

		return $products;
	}

	public function addOrder($name, $desc) {
		$this->db->query("INSERT INTO orders (name, description) VALUES ('$name', '$desc')");
	}

	public function updateOrder($id, $name, $desc) {
		$this->db->query("UPDATE orders SET name='$name', description='$desc' WHERE id='$id'");
	}

	public function getOrder($id) {
		$query = $this->db->query("SELECT * FROM orders WHERE id='$id'");
		$product = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$product['id'] = $row->id;
				$product['name'] = $row->name;
				$product['desc'] = $row->description;
			}
		}

		return $product;
	}

	public function delOrder($id) {
		$this->db->query("UPDATE orders SET deleted='1' WHERE id='$id'");
	}

}

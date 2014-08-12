<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Library_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList() {
		$query = $this->db->query("SELECT * FROM products WHERE deleted='0'");

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
	
	public function getPackingsList() {
		$query = $this->db->query("SELECT * FROM packings WHERE deleted='0'");

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

	public function addProduct($name, $desc) {
		$this->db->query("INSERT INTO products (name, description) VALUES ('$name', '$desc')");
	}
	
	public function updateProduct($id, $name, $desc) {
		$this->db->query("UPDATE products SET name='$name', description='$desc' WHERE id='$id'");
	}

	public function getProduct($id) {
		$query = $this->db->query("SELECT * FROM products WHERE id='$id'");
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

	public function delProduct($id) {
		$this->db->query("UPDATE products SET deleted='1' WHERE id='$id'");
	}
}

<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Packing_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList() {
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

	public function addPacking($name, $desc) {
		$this->db->query("INSERT INTO packings (name, description) VALUES ('$name', '$desc')");
	}
	
	public function updatePacking($id, $name, $desc) {
		$this->db->query("UPDATE packings SET name='$name', description='$desc' WHERE id='$id'");
	}

	public function getPacking($id) {
		$query = $this->db->query("SELECT * FROM packings WHERE id='$id'");
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

	public function delPacking($id) {
		$this->db->query("UPDATE packings SET deleted='1' WHERE id='$id'");
	}
}

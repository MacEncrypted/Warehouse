<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Clients_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList() {
		$query = $this->db->query("SELECT * FROM clients WHERE deleted='0' ORDER BY name ASC");

		$clients = array();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$product = array();
				$product['id'] = $row->id;
				$product['name'] = $row->name;
				$product['desc'] = $row->description;
				$clients[] = $product;
			}
		}

		return $clients;
	}

	public function addClient($name, $desc) {
		$this->db->query("INSERT INTO clients (name, description) VALUES ('$name', '$desc')");
	}

	public function updateClient($id, $name, $desc) {
		$this->db->query("UPDATE clients SET name='$name', description='$desc' WHERE id='$id'");
	}

	public function getClient($id) {
		$query = $this->db->query("SELECT * FROM clients WHERE id='$id'");
		$client = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$client['id'] = $row->id;
				$client['name'] = $row->name;
				$client['desc'] = $row->description;
			}
		}

		return $client;
	}

	public function delClient($id) {
		$this->db->query("UPDATE clients SET deleted='1' WHERE id='$id'");
	}

}

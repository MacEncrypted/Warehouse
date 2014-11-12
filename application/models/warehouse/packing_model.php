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
				if ($this->checkPackingNull($row->id)) {
					$product['null'] = 1;
				} else {
					$product['null'] = 0;
				}
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
		if ($this->checkPackingNull($id)) {
			$this->db->query("UPDATE packings SET deleted='1' WHERE id='$id'");
			return true;
		} else {
			return false;
		}
	}

	public function checkPackingNull($id) {
		$q = "SELECT "
				. "products.id AS id, "
				. "magazyn.sum AS magazyn_sum, "
				. "production.sum AS production_sum, "
				. "onway.sum AS onway_sum "
				. "FROM products "
				. "LEFT JOIN (SELECT id_product, sum(amount) AS sum, id_packing  FROM `log` WHERE (action=2 OR action=3 OR action=4 OR action=6) AND id_packing=$id "
				. "GROUP BY 1 ORDER BY 2) AS magazyn "
				. "ON products.id=magazyn.id_product "
				. "LEFT JOIN (SELECT id_product, id_packing, sum(amount) AS sum FROM `log` WHERE (action=5 OR action=6) AND id_packing=$id "
				. "GROUP BY 1) AS onway "
				. "ON products.id=onway.id_product "
				. "LEFT JOIN (SELECT id_product, sum(amount) AS sum, id_packing FROM `log` WHERE (action=1) AND id_packing=$id "
				. "GROUP BY 1 ORDER BY 2) AS production "
				. "ON products.id=production.id_product "
				. "WHERE products.deleted='0' ";

		$query = $this->db->query($q);

		$products = array();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$product = array();
				$product['id'] = $row->id;
				$product['magazyn_sum'] = intval($row->magazyn_sum);
				$product['onway_sum'] = intval(0 - $row->onway_sum);
				$product['production_sum'] = intval($row->production_sum);
				$products[] = $product;
			}
		}

		$totals = array();

		foreach ($products as $product) {
			//$totals[$product['id']] = $product['magazyn_sum'] + $product['production_sum'] - $product['onway_sum'];			
			if ($product['onway_sum'] != 0) {
				return false;
			}
		}

//		echo '<pre>';
//		echo print_r($products, true);
//		echo print_r($totals, true);
//		exit;

		return true;
	}

}

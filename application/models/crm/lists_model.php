<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Lists_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList($idDocument, $moreZero, $fullProducts = false) {
		$this->load->model('warehouse/library_model');

		if ($moreZero) {
			$query = $this->db->query("SELECT * FROM lists WHERE deleted='0' AND id_document='$idDocument' AND amount>'0' ORDER BY `date` ASC");
		} else {
			$query = $this->db->query("SELECT * FROM lists WHERE deleted='0' AND id_document='$idDocument' AND amount<'0' ORDER BY `date` ASC");
		}

		$lists = array();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$list = array();
				$list['id'] = $row->id;
				$list['date'] = $row->date;
				$list['amount'] = $row->amount;
				$list['id_document'] = $row->id_document;
				$list['id_product'] = $row->id_product;
				if ($fullProducts) {
					$list['product'] = $this->library_model->getProduct($row->id_product);
				}
				$lists[] = $list;
			}
		}

		return $lists;
	}

	public function getListSingle($id)
	{
		$query = $this->db->query("SELECT * FROM lists WHERE id='$id'");

		$list = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$list['id'] = $row->id;
				$list['date'] = $row->date;
				$list['amount'] = $row->amount;
				$list['id_document'] = $row->id_document;
				$list['id_product'] = $row->id_product;
				$list['product'] = $this->library_model->getProduct($row->id_product);
			}
		}

		return $list;
	}

	public function addList($idDocument, $idProduct, $date, $amount, $type) {
		if (!$type) {
			$amount = 0 - $amount;
		}
		$this->db->query("INSERT INTO lists (`id_document`, `id_product`, `date`, `amount`) VALUES ('$idDocument', '$idProduct', '$date', '$amount')");
	}

	public function delList($id) {
		$this->db->query("UPDATE lists SET deleted='1' WHERE id='$id'");
	}

}

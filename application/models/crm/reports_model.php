<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Reports_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	private function recalculateRow($row)
	{
		if ($row[2] == 0) {
			$row[3] = 0;
			return $row;
		}

		if ($row[1] == 0) {
			$row[3] = 100;
			return $row;
		}

		$row[3] = intval(($row[2] / $row[1]*100));
		return $row;
	}

	public function generateClientReport($idClient, $start, $end)
	{
		$this->load->model('warehouse/library_model');
		$query = $this->db->query("SELECT * FROM lists l JOIN documents d ON d.id = l.id_document WHERE d.deleted='0' AND l.deleted='0' AND l.date>='$start' AND l.date<='$end' AND d.id_client='$idClient' ORDER BY `date` ASC");

		$report = array();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if (!isset($report[$row->id_product])) {
					$reportRow = array();
					$p = $this->library_model->getProduct($row->id_product);
					$reportRow[] = $p['name'];
					$reportRow[] = 0;
					$reportRow[] = 0;
					$reportRow[] = 100;
				} else {
					$reportRow = $report[$row->id_product];
				}

				if ($row->amount > 0) {
					$reportRow[1] += $row->amount;
				} else {
					$reportRow[2] += ( 0 - $row->amount);
				}

				$reportRow = $this->recalculateRow($reportRow);
				$report[$row->id_product] = $reportRow;
			}
		}

		return $report;
	}

	public function getProductReq($idProduct, $start, $end)
	{
		$query = $this->db->query("SELECT * FROM lists l JOIN documents d ON d.id = l.id_document WHERE d.deleted='0' AND l.deleted='0' " .
			"AND id_product='$idProduct' AND `date`>='$start' AND `date`<='$end' AND l.amount>'0' ORDER BY `date` ASC");

		$sum = 0;

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$sum += $row->amount;
			}
		}

		return $sum;
	}

	public function generateProductReport($idProduct, $start, $end)
	{
		$this->load->model('crm/clients_model');
		$query = $this->db->query("SELECT * FROM lists l JOIN documents d ON d.id = l.id_document WHERE d.deleted='0' AND l.deleted='0' " .
										"AND id_product='$idProduct' AND `date`>='$start' AND `date`<='$end' ORDER BY `date` ASC");

		$report = array();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				if (!isset($report[$row->id_client])) {
					$reportRow = array();
					$c = $this->clients_model->getClient($row->id_client);
					$reportRow[] = $c['name'];
					$reportRow[] = 0;
					$reportRow[] = 0;
					$reportRow[] = 100;
				} else {
					$reportRow = $report[$row->id_client];
				}

				if ($row->amount > 0) {
					$reportRow[1] += $row->amount;
				} else {
					$reportRow[2] -= $row->amount;
				}

				$reportRow = $this->recalculateRow($reportRow);
				$report[$row->id_client] = $reportRow;
			}
		}

		return $report;
	}
}

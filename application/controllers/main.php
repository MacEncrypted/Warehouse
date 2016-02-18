<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('warehouse/log_model');
		$this->load->model('warehouse/library_model');
		$this->load->model('warehouse/packing_model');
		$this->load->model('users/manage_model');
	}

	public function index() {
		$data = array();

		if ($this->config->item('language') == 'polish') {
			$this->load->view('index_polish_view', $data);
		} else {
			$this->load->view('index_view', $data);
		}
	}

	public function noaccess() {
		$data = array();
		$this->load->view('noaccess_view', $data);
	}
	
	public function version($request = '') {
		if($request != '') {
			// save requestor?
		}
		echo VERSION;
	}
}

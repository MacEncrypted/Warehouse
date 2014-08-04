<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('warehouse/log_model');
	}

	public function index()
	{
		$data = array();
		$this->load->view('index_view', $data);
	}
	
	public function notes() 
	{
		echo 'TODO';
	}
	
	public function status() {
		$data = array();
		$data['products'] = $this->log_model->getStatusList();
		$this->load->view('status_view', $data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('warehouse/log_model');
		$this->load->model('users/manage_model');
	}

	public function index()
	{
		$data = array();
		$this->load->view('index_view', $data);
	}
	
	public function status() {
		$data = array();
		$data['products'] = $this->log_model->getNewStatusList();
		$this->load->view('status_view', $data);
	}
	
	public function reports() {
		$data = array();
		if($this->input->post('sent')) {		
			$data['reports'] = $this->log_model->getReports($this->input->post('start'),$this->input->post('end'),$this->input->post('user'));
			$generate['start'] = $this->input->post('start');
			$generate['end'] = $this->input->post('end');
			$generate['user'] = $this->input->post('user');
			$data['generate'] = $generate;		
		}		
		$data['users'] = $this->manage_model->getList();
		$this->load->view('reports_view', $data);
	}
}
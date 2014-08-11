<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 1 - produkcja
 * 
 * 
 * 
 */
class Add extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_lvl')) {
			die('Access restricted!');
		}
		$this->load->model('warehouse/library_model');
		$this->load->model('warehouse/log_model');
	}

	public function index()
	{
		
	}
		
	// id = 1
	public function production() {		
		$data = array();
		$data['products'] = $this->library_model->getList();
		$data['reports'] = $this->log_model->getList(1);
		
		if($this->input->post('sent')) {
				$this->log_model->addAction($this->input->post('id'), $this->input->post('amount'), 1);
				redirect('main/status','refresh');
			} else {
				$this->load->view('warehouse/add/production_view', $data);
			}
	}
	
		public function returner() {		
		$data = array();
		$data['products'] = $this->library_model->getList();
		
		if($this->input->post('sent')) {
				$this->log_model->addAction($this->input->post('id'), $this->input->post('amount'), 2);
				redirect('main/status','refresh');
			} else {
				$this->load->view('warehouse/add/returner_view', $data);
			}
	}
	
	public function admin() {		
		$data = array();
		$data['products'] = $this->library_model->getList();
		
		if($this->input->post('sent')) {
				$this->log_model->addAction($this->input->post('id'), $this->input->post('amount'), 3);
				redirect('main/status','refresh');
			} else {
				$this->load->view('warehouse/add/admin_view', $data);
			}
	}
	
	public function sent() {		
		$data = array();
		$data['products'] = $this->library_model->getList();
		
		if($this->input->post('sent')) {
				$this->log_model->addAction($this->input->post('id'), (0 - $this->input->post('amount')), 4);
				redirect('main/status','refresh');
			} else {
				$this->load->view('warehouse/add/sent_view', $data);
			}
	}
}
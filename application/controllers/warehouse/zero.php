<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Zero extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('admin_lvl')) {
			die('Access restricted!');
		}
		$this->load->model('warehouse/zero_model');
	}

	public function index()
	{
		$data = array();
		$data['info'] = '';
		if($this->input->post('sent')) {
			if($this->input->post('zero_all')) {
				$this->zero_model->zeroAll();
				$data['info'] = $this->lang->line('h2_zero_all_info');
			}
			if($this->input->post('zero_pro')) {
				$this->zero_model->zeroPro();
				$data['info'] = $this->lang->line('h2_zero_pro_info');
			}
		}
		$this->load->view('warehouse/zero_view', $data);
	}
}
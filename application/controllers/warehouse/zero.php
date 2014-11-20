<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Zero extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->load->model('warehouse/zero_model');
		$this->load->model('warehouse/library_model');
	}

	public function index() {
		$data = array();
		$data['info'] = '';
		if ($this->input->post('sent')) {
			if ($this->input->post('zero_all')) {
				$this->zero_model->zeroAll();
				$data['info'] = $this->lang->line('h2_zero_all_info');
			}
			if ($this->input->post('zero_pro')) {
				$this->zero_model->zeroPro();
				$data['info'] = $this->lang->line('h2_zero_pro_info');
			}
			if ($this->input->post('zero_desc')) {
				// 1 = in production
				if ($this->zero_model->zeroDesc($this->input->post('zero_desc'), 1)) {
					$data['info'] = $this->lang->line('h2_zero_desc_info');
				} else {
					$data['info'] = $this->lang->line('h2_zero_desc_error_info');
				}
			}
		}
		$data['descriptions'] = $this->library_model->getDescriptions();
		$this->load->view('warehouse/zero_view', $data);
	}

}

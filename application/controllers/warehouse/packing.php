<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Packing extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->load->model('warehouse/packing_model');
	}

	public function index() {
		$this->edit(0);
	}

	public function edit($id) {
		$data = array();
		$data['products'] = $this->packing_model->getList();
		if ($id == 0) {
			// add new	
			if ($this->input->post('sent')) {
				$this->packing_model->addPacking($this->input->post('name'), $this->input->post('desc'));
				redirect('warehouse/packing', 'refresh');
			} else {
				$this->load->view('warehouse/packingedit_view', $data);
			}
		} else {
			// edit
			if ($this->input->post('sent')) {
				$this->packing_model->updatePacking($id, $this->input->post('name'), $this->input->post('desc'));
				redirect('warehouse/packing', 'refresh');
			} else {
				$data['user'] = $this->packing_model->getPacking($id);
				$this->load->view('warehouse/packingedit_view', $data);
			}
		}
	}

	public function del($id) {
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->packing_model->delPacking($id);
		redirect('warehouse/packing', 'refresh');
	}

}

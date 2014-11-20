<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Add extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->load->model('warehouse/library_model');
		$this->load->model('warehouse/log_model');
		$this->load->model('warehouse/order_model');
	}

	public function index() {
		
	}

	// id = 1
	public function production() {
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$data = array();
		if ($this->input->post('sent')) {
			$this->log_model->addAction($this->input->post('id'), $this->input->post('amount'), 1, 0, $this->input->post('oid'));
		}

		$data['products'] = $this->library_model->getList();
		$data['reports'] = $this->log_model->getOrderList(1);
		$data['orders'] = $this->order_model->getList();

		$this->load->view('warehouse/add/production_view', $data);
	}

	public function returner() {
		$data = array();
		$data['products'] = $this->library_model->getList();

		if ($this->input->post('sent')) {
			$this->log_model->addAction($this->input->post('id'), $this->input->post('amount'), 2);
			redirect('enc/status', 'refresh');
		} else {
			$this->load->view('warehouse/add/returner_view', $data);
		}
	}

	public function admin() {
		$data = array();
		$data['products'] = $this->library_model->getList();

		if ($this->input->post('sent')) {
			$this->log_model->addAction($this->input->post('id'), $this->input->post('amount'), 3);
			redirect('enc/status', 'refresh');
		} else {
			$this->load->view('warehouse/add/admin_view', $data);
		}
	}

	public function sent() {
		$data = array();
		$data['products'] = $this->library_model->getList();

		if ($this->input->post('sent')) {
			$this->log_model->addAction($this->input->post('id'), (0 - $this->input->post('amount')), 4);
			redirect('warehouse/add/sent', 'refresh');
		} else {
			$this->load->view('warehouse/add/sent_view', $data);
		}
	}

	// id = 5
	public function onway() {
		$data = array();
		$amount = 0 - $this->input->post('amount');
		if ($this->input->post('sent')) {
			$this->log_model->addAction($this->input->post('id'), $amount, 5, $this->input->post('pckgid'));
		}

		$data['products'] = $this->library_model->getList();
		$data['packings'] = $this->library_model->getPackingsList();
		$data['reports'] = $this->log_model->getPackingList(5, 6);

		$this->load->view('warehouse/add/onway_view', $data);
	}

	// id = 5 + bloack 1 list
	public function grouponway() {
		$data = array();

		if ($this->input->post('pckgid')) {
			if ($this->input->post('sent') && $this->input->post('id') && $this->input->post('amount')) {
				$amount = 0 - $this->input->post('amount');
				$this->log_model->addAction($this->input->post('id'), $amount, 5, $this->input->post('pckgid'));
			}

			$data['products'] = $this->library_model->getList();
			$data['packings'] = $this->library_model->getPackingsList();
			$data['reports'] = $this->log_model->getPackingList(5, 6);
			$data['lock'] = $this->input->post('pckgid');

			$this->load->view('warehouse/add/grouponway_lock_view', $data);
		} else {
			$data['packings'] = $this->library_model->getPackingsList();
			$data['reports'] = $this->log_model->getPackingList(5, 6);
			$this->load->view('warehouse/add/grouponway_pre_view', $data);
		}
	}

	// id = 6
	public function packing() {
		$data = array();
		$amount = $this->input->post('amount');
		if ($this->input->post('sent')) {
			$this->log_model->addAction($this->input->post('id'), $amount, 6, $this->input->post('pckgid'));
		}

		$data['products'] = $this->library_model->getList();
		$data['packings'] = $this->library_model->getPackingsList();
		$data['reports'] = $this->log_model->getPackingList(6, 0);

		$this->load->view('warehouse/add/packing_view', $data);
	}

	// id = 6
	public function grouppacking() {
		$data = array();

		if ($this->input->post('pckgid')) {
			if ($this->input->post('sent') && $this->input->post('id') && $this->input->post('amount')) {
				$amount = $this->input->post('amount');
				$this->log_model->addAction($this->input->post('id'), $amount, 6, $this->input->post('pckgid'));
			}

			$data['products'] = $this->library_model->getList();
			$data['packings'] = $this->library_model->getPackingsList();
			$data['reports'] = $this->log_model->getPackingList(6, 0);
			$data['lock'] = $this->input->post('pckgid');

			$this->load->view('warehouse/add/grouppacking_lock_view', $data);
		} else {
			$data['packings'] = $this->library_model->getPackingsList();
			$data['reports'] = $this->log_model->getPackingList(6, 0);
			$this->load->view('warehouse/add/grouppacking_pre_view', $data);
		}
	}

	// id = 6
	public function autopacking() {
		$data = array();
		$data['auto'] = true;

		if ($this->input->post('pckgid')) {

			$packing_id = $this->input->post('pckgid');
			$this->log_model->copyActionByPacking(5, 6, $packing_id);

			$data['products'] = $this->library_model->getList();
			$data['packings'] = $this->library_model->getPackingsList();
			$data['reports'] = $this->log_model->getPackingList(6, 0);
			$data['lock'] = $this->input->post('pckgid');

			$this->load->view('warehouse/add/grouppacking_lock_view', $data);
		} else {
			$data['packings'] = $this->library_model->getPackingsList();
			$data['reports'] = $this->log_model->getPackingList(6, 0);
			$this->load->view('warehouse/add/grouppacking_pre_view', $data);
		}
	}

}

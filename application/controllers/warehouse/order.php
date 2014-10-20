<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->load->model('warehouse/order_model');
	}

	public function index()
	{
		$this->edit(0);
	}
	
	public function edit($id) {		
		$data = array();
		$data['orders'] = $this->order_model->getList();
		if($id == 0) {
			// add new	
			if($this->input->post('sent')) {
				$this->order_model->addOrder($this->input->post('name'), $this->input->post('desc'));
				redirect('warehouse/order','refresh');
			} else {
				$this->load->view('warehouse/orderedit_view', $data);
			}
		} else {	
			// edit
			if($this->input->post('sent')) {
				$this->order_model->updateOrder($id, $this->input->post('name'), $this->input->post('desc'));
				redirect('warehouse/order','refresh');
			} else {			
				$data['user'] = $this->order_model->getOrder($id);			
				$this->load->view('warehouse/orderedit_view', $data);
			}
		}
	}
	
	public function del($id) {
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->order_model->delOrder($id);			
		redirect('warehouse/order','refresh');
	}
}
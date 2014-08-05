<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Library extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_lvl')) {
			die('Access restricted!');
		}
		$this->load->model('warehouse/library_model');
	}

	public function index()
	{
		$data = array();
		$data['products'] = $this->library_model->getList();
		$this->load->view('warehouse/library_view', $data);
	}
	
	public function edit($id) {		
		$data = array();
		if($id == 0) {
			// add new	
			if($this->input->post('sent')) {
				$this->library_model->addProduct($this->input->post('name'), $this->input->post('desc'));
				redirect('warehouse/library','refresh');
			} else {
				$this->load->view('warehouse/edit_view', $data);
			}
		} else {	
			// edit
			if($this->input->post('sent')) {
				$this->library_model->updateProduct($id, $this->input->post('name'), $this->input->post('desc'));
				redirect('warehouse/library','refresh');
			} else {			
				$data['user'] = $this->library_model->getProduct($id);			
				$this->load->view('warehouse/edit_view', $data);
			}
		}
	}
	
	public function del($id) {
		if (!$this->session->userdata('admin_lvl')) {
			die('Access restricted!');
		}
		$this->library_model->delProduct($id);			
		redirect('warehouse/library','refresh');
	}
	
	public function addpacking() {
		
		$data['products'] = $this->library_model->getList();
		
		if($this->input->post('sent')) {
				$this->library_model->addProduct($this->input->post('id'), $this->input->post('amount'));
				redirect('main/status','refresh');
			} else {
				$this->load->view('warehouse/addpacking_view', $data);
			}
	}
}
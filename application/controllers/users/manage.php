<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('admin_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->load->model('users/manage_model');
	}

	public function index() {
		$data = array();
		$data['users'] = $this->manage_model->getList();
		$this->load->view('users/manage_view', $data);
	}

	public function edit($id) {
		$data = array();
		if (($id == 1) && (base_url() == 'http://warehouse.encrypted.pl/')) {
			die('Editing or deleting root on demo is forbidden!<br/> <a href="' . base_url() . '">Go to main page</a>');
		}
		echo base_url(); exit;
		if ($id == 0) {
			// add new	
			if ($this->input->post('sent')) {
				$this->manage_model->addUser($this->input->post('login'), $this->input->post('passwd'), $this->input->post('level'));
				redirect('users/manage', 'refresh');
			} else {
				$this->load->view('users/edit_view', $data);
			}
		} else {
			// edit
			if ($this->input->post('sent')) {
				$this->manage_model->updateUser($id, $this->input->post('login'), $this->input->post('passwd'), $this->input->post('level'));
				redirect('users/manage', 'refresh');
			} else {
				$data['user'] = $this->manage_model->getUser($id);
				$this->load->view('users/edit_view', $data);
			}
		}
	}

	public function del($id) {
		if (($id == 1) && (base_url() == 'http://warehouse.encrypted.pl/')) {
			die('Editing or deleting root on demo is forbidden!<br/> <a href="' . base_url() . '">Go to main page</a>');
		}
		$this->manage_model->delUser($id);
		redirect('users/manage', 'refresh');
	}

}

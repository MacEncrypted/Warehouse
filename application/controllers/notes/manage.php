<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('user_lvl')) {
			die(redirect(base_url() . 'main/noaccess'));
		}
		$this->load->model('notes/notes_model');
		$this->load->model('users/manage_model');
	}

	public function index() {
		$data = array();
		$data['notes'] = $this->notes_model->getList();
		$data['users'] = $this->manage_model->getList();
		$this->load->view('notes/manage_view', $data);
	}

	public function edit($id) {
		$data = array();
		if ($id == 0) {
			// add new	
			if ($this->input->post('sent')) {
				$this->notes_model->addNote($this->input->post('data'), $this->input->post('id_user'), $this->input->post('title'), $this->input->post('text'));
				redirect('notes/manage', 'refresh');
			} else {
				$data['users'] = $this->manage_model->getList();
				$this->load->view('notes/edit_view', $data);
			}
		} else {
			// edit
			if ($this->input->post('sent')) {
				$this->notes_model->updateNote($id, $this->input->post('data'), $this->input->post('id_user'), $this->input->post('title'), $this->input->post('text'));
				redirect('notes/manage', 'refresh');
			} else {
				$data['note'] = $this->notes_model->getNote($id);
				$data['users'] = $this->manage_model->getList();
				$this->load->view('notes/edit_view', $data);
			}
		}
	}

	public function del($id) {
		$this->notes_model->delNote($id);
		redirect('notes/manage', 'refresh');
	}

}

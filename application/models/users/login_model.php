<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Login_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->init();
	}

	public function init() {
		$this->load->library('session');
		if ($this->session->userdata('user_id')) {
			$this->loadUserData();
			$this->signout();
		} else {
			$this->signin();
		}
	}

	public function signin() {
		if ($this->input->post('login') && $this->input->post('passwd')) {

			$login = $this->input->post('login');
			$passwd = md5($this->input->post('passwd'));

			$query = $this->db->query("SELECT id FROM users WHERE login='$login' AND passwd='$passwd'");

			if ($query->num_rows() > 0) {
				$row = $query->row();
				$this->session->set_userdata('user_id', $row->id);
				$this->loadUserData();
				check_warehouse_update();
			}
		}
	}

	public function signout() {
		if ($this->input->post('logout') || $this->input->get('logout')) {
			$this->session->sess_destroy();
			redirect(base_url(), 'refresh');
		}
	}

	public function loadUserData() {

		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM users WHERE id='$id'");

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('user_login', $row->login);
			if ($row->level == 1) {
				// user
				$this->session->set_userdata('user_lvl', true);
			}
			if ($row->level == 2) {
				// admin
				$this->session->set_userdata('user_lvl', true);
				$this->session->set_userdata('admin_lvl', true);
			}
		}
	}

}

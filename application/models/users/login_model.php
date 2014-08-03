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
			}
		}
	}

	public function signout() {
		if ($this->input->post('logout') || $this->input->get('logout')) {
			$this->session->set_userdata('user_id', null);
			redirect(base_url(),'refresh');
		}
	}

	public function loadUserData() {

		$id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT * FROM users WHERE id='$id'");

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('user_login', $row->login);
		}
	}

}

<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Manage_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList() {
		$query = $this->db->query("SELECT * FROM users WHERE deleted='0'");

		$users = array();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$user = array();
				$user['id'] = $row->id;
				$user['login'] = $row->login;
				$user['level'] = $row->level;
				$users[] = $user;
			}
		}

		return $users;
	}

	public function addUser($login, $passwd, $level) {
		$hash = md5($passwd);
		$this->db->query("INSERT INTO users (login, passwd, level) VALUES ('$login', '$hash', '$level')");
	}

	public function updateUser($id, $login, $passwd, $level) {
		$hash = md5($passwd);
		$this->db->query("UPDATE users SET login='$login', passwd='$hash', level='$level' WHERE id='$id'");
	}

	public function getUser($id) {
		$query = $this->db->query("SELECT * FROM users WHERE id='$id'");
		$user = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$user['id'] = $row->id;
				$user['login'] = $row->login;
				$user['level'] = $row->level;
			}
		}

		return $user;
	}

	public function delUser($id) {
		$this->db->query("UPDATE users SET passwd='', deleted='1' WHERE id='$id'");
	}

}

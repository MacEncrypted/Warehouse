<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Notes_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getList() {
		$q = "SELECT "
				. "notes.id as id, "
				. "notes.data as data, "
				. "notes.title as title, "
				. "notes.text as text, "
				. "users.login as login "
				. "FROM notes JOIN users on notes.id_user=users.id WHERE notes.deleted='0'";

		//echo $q; exit;

		$query = $this->db->query($q);

		$users = array();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$user = array();
				$user['id'] = $row->id;
				$user['data'] = $row->data;
				$user['title'] = $row->title;
				$user['text'] = $row->text;
				$user['user'] = $row->login;
				$users[] = $user;
			}
		}

		//var_dump($users); exit;

		return $users;
	}

	public function addNote($data, $id_user, $title, $text) {
		$this->db->query("INSERT INTO notes (data, id_user, title, text) "
				. "VALUES ('$data', '$id_user', '$title', '$text')");
	}

	public function updateNote($id, $data, $id_user, $title, $text) {
		$this->db->query("UPDATE notes SET data='$data', id_user='$id_user', title='$title', text='$text' WHERE id='$id'");
	}

	public function getNote($id) {
		$query = $this->db->query("SELECT * FROM notes WHERE id='$id'");
		$user = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$user['id'] = $row->id;
				$user['data'] = $row->data;
				$user['title'] = $row->title;
				$user['text'] = $row->text;
				$user['id_user'] = $row->id_user;
			}
		}

		return $user;
	}

	public function delUser($id) {
		$this->db->query("UPDATE notes SET deleted='1' WHERE id='$id'");
	}

}

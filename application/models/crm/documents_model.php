<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Documents_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function uploadFile($input = 'file') {
		$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

		if(!file_exists($_FILES[$input]['tmp_name']) || !is_uploaded_file($_FILES[$input]['tmp_name'])) {
			return '';
		}

		if ($_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
			die("Upload failed with error " . $_FILES[$input]['error']);
		}
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mime = finfo_file($finfo, $_FILES[$input]['tmp_name']);

		if ($mime != 'application/pdf') {
			die("Unknown/not permitted file type: " . $mime);
		}

		$filename = md5(microtime()) . '.pdf';
		move_uploaded_file($_FILES[$input]['tmp_name'], $path . $filename);

		return $filename;
	}

	public function getList($idClient) {
		$query = $this->db->query("SELECT * FROM documents WHERE deleted='0' AND id_client='$idClient' ORDER BY name ASC");

		$documents = array();

		if ($query->num_rows() > 0) {

			foreach ($query->result() as $row) {
				$document = array();
				$document['id'] = $row->id;
				$document['name'] = $row->name;
				$document['file'] = $row->file;
				$document['start'] = $row->start;
				$document['end'] = $row->end;
				$document['id_client'] = $row->id_client;
				$documents[] = $document;
			}
		}

		return $documents;
	}

	public function addDocument($name, $file, $start, $end, $idClient) {
		$this->db->query("INSERT INTO documents (`name`, `file`, `start`, `end`, `id_client`) VALUES ('$name', '$file', '$start', '$end', '$idClient')");
	}

	public function updateDocument($id, $name, $file, $start, $end, $idClient) {
		$this->db->query("UPDATE documents SET `name`='$name', `start`='$start', `end`='$end', `id_client`='$idClient' WHERE id='$id'");
		if ($file != '') {
			$this->db->query("UPDATE documents SET `file`='$file' WHERE id='$id'");
		}
	}

	public function getDocument($id) {
		$query = $this->db->query("SELECT * FROM documents WHERE id='$id'");
		$document = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$document['id'] = $row->id;
				$document['name'] = $row->name;
				$document['file'] = $row->file;
				$document['start'] = $row->start;
				$document['end'] = $row->end;
				$document['id_client'] = $row->id_client;
			}
		}

		return $document;
	}

	public function delDocument($id) {
		$this->db->query("UPDATE documents SET deleted='1' WHERE id='$id'");
	}

}

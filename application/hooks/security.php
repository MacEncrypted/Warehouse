<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

// additional SQL security for $_POST array
class Security {

	private $CI;

	function sec() {
		$this->post_sec();
		$this->get_sec();
	}

	function post_sec() {
		$this->CI = &get_instance();
		$sec = array();

		foreach ($_POST as $key => $val) {

			$sec[$key] = addslashes($_POST[$key]);

			$sec[$key] = str_replace("'", '', $sec[$key]);
			$sec[$key] = str_replace('"', '', $sec[$key]);
			$sec[$key] = str_replace("--", '', $sec[$key]);
		}

		$_POST = $sec;
	}

	function get_sec() {
		$this->CI = &get_instance();
		$sec = array();

		foreach ($_GET as $key => $val) {
			$sec[$key] = str_replace("'", '', $_GET[$key]);
			$sec[$key] = str_replace('"', '', $sec[$key]);
			$sec[$key] = str_replace("--", '', $sec[$key]);
		}

		$_GET = $sec;
	}

}

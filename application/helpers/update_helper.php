<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

if (!function_exists('check_warehouse_update')) {

	function check_warehouse_update() {
		$CI = & get_instance();
		try {
			$ctx = stream_context_create(array('http'=>
				array(
					'timeout' => 15, // 10 secs
				)
			));

			$regex = '/(?<!href=["\'])http:\/\//';
			$key = preg_replace($regex, '', base_url());
			$update = (float)@file_get_contents(UPDATE_URL . $key , false, $ctx);
		} catch(Exception $e) {	}
		
		if($update == false) {
			$update = 'connection error';
		}
		
		$CI->session->set_userdata('version', VERSION);
		$CI->session->set_userdata('update', $update);
	}

}
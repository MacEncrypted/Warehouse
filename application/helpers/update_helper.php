<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

if (!function_exists('check_warehouse_update')) {

	function check_warehouse_update() {
		$CI = & get_instance();
		
		$ctx = stream_context_create(array('http'=>
			array(
				'timeout' => 15, // 10 secs
			)
		));
		
		$regex = '/(?<!href=["\'])http:\/\//';
		$key = preg_replace($regex, '', base_url());

		$update = file_get_contents(DEMO_URL . 'main/version/' . $key , false, $ctx);
		
		$CI->session->set_userdata('version', VERSION);
		$CI->session->set_userdata('update', $update);
	}

}
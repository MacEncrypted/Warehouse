<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct() {
		parent::__construct();	
		$this->load->model('warehouse/log_model');
        $this->load->model('warehouse/library_model');
        $this->load->model('warehouse/packing_model');
		$this->load->model('users/manage_model');
	}

	public function index()
	{
		$data = array();
		$this->load->view('index_view', $data);
	}	
        
        public function noaccess()
        {
            $data = array();
            $this->load->view('noaccess_view', $data);
        }
}
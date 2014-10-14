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
	
	public function status() {
		$data = array();
		$data['products'] = $this->log_model->getNewStatusList();
		$this->load->view('status_view', $data);
	}
	
	public function reports() {
		$data = array();
		if($this->input->post('sent')) {		
			$data['reports'] = $this->log_model->getReports($this->input->post('start'),$this->input->post('end'),$this->input->post('user'));
			$generate['start'] = $this->input->post('start');
			$generate['end'] = $this->input->post('end');			
			$data['generate'] = $generate;		
			$data['user'] = $this->manage_model->getUser($this->input->post('user'));
		}		
		$data['users'] = $this->manage_model->getList();
		$this->load->view('reports_view', $data);
	}
	
	public function proreports() {
		$data = array();
		if($this->input->post('sent')) {		
			$data['reports'] = $this->log_model->getProReports($this->input->post('start'),$this->input->post('end'),$this->input->post('about'));
			$generate['start'] = $this->input->post('start');
			$generate['end'] = $this->input->post('end');
			$generate['desc'] = $this->input->post('desc');
			$data['generate'] = $generate;		
			$data['user'] = $this->manage_model->getUser($this->input->post('user'));
		}		
		$data['users'] = $this->manage_model->getList();
		$this->load->view('proreports_view', $data);
	}
	
	public function genreports() {
		$data = array();
		if($this->input->post('sent')) {		
			$data['reports'] = $this->log_model->getReports($this->input->post('start'),$this->input->post('end'),$this->input->post('user'));
			$generate['start'] = $this->input->post('start');
			$generate['end'] = $this->input->post('end');			
			$data['generate'] = $generate;		
			$data['user'] = $this->manage_model->getUser($this->input->post('user'));
		} else {
			redirect('main/reports');
		}		
		$this->load->view('reportsgen_view', $data);
	}
	
	public function genproreports() {
		$data = array();
		if($this->input->post('sent')) {		
			$data['reports'] = $this->log_model->getProReports($this->input->post('start'),$this->input->post('end'),$this->input->post('desc'));
			$generate['start'] = $this->input->post('start');
			$generate['end'] = $this->input->post('end');
			$generate['desc'] = $this->input->post('desc');
			$data['generate'] = $generate;		
			$data['user'] = $this->manage_model->getUser($this->input->post('user'));
		} else {
			redirect('main/proreports');
		}		
		$this->load->view('proreportsgen_view', $data);
	}
        
        public function search() {
            $data = array();
            $data['products'] = $this->library_model->getList();
            $data['packings'] = $this->packing_model->getList();
            $this->load->view('search_view', $data);
        }
        
        public function gensearch() {
            $data = array();
		if($this->input->post('sent')) {		
			$data['products'] = $this->log_model->getSearchList($this->input->post('start'),$this->input->post('end'),$this->input->post('products'),$this->input->post('packings'));
			$generate['start'] = $this->input->post('start');
			$generate['end'] = $this->input->post('end');
			
                        if ($this->input->post('packing') != '') {
                            $generate['packing'] = $this->packing_model->getPacking($this->input->post('packings'));
                        }
                        if ($this->input->post('products') != '') {
                            $generate['product'] = $this->library_model->getProduct($this->input->post('products'));
                        }
                        
                        $data['generate'] = $generate;		
		} else {
			redirect('main/search');
		}		
		$this->load->view('searchgen_view', $data);
        }
}
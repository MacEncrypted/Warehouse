<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->load->model('crm/reports_model');
        $this->load->model('crm/clients_model');
        $this->load->model('warehouse/library_model');
    }

    public function index() {
        $data = array();
        $data['products'] = $this->library_model->getList();
        $data['clients'] = $this->clients_model->getList();

        if ($this->input->post('sentp')) {
            $data['start'] = $this->input->post('start');
            $data['end'] = $this->input->post('end');
            $data['product'] = $this->library_model->getProduct($this->input->post('product'));
            $data['report'] = $this->reports_model->generateProductReport($this->input->post('product'), $this->input->post('start'), $this->input->post('end'));
            $this->load->view('crm/reports/report_view', $data);
        } elseif ($this->input->post('sentc')) {
            $data['start'] = $this->input->post('start');
            $data['end'] = $this->input->post('end');
            $data['client'] = $this->clients_model->getClient($this->input->post('client'));
            $data['report'] = $this->reports_model->generateClientReport($this->input->post('client'), $this->input->post('start'), $this->input->post('end'));
            $this->load->view('crm/reports/report_view', $data);
        } else {
            $this->load->view('crm/reports/prepare_view', $data);
        }

    }
}

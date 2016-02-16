<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clients extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('admin_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->load->model('crm/clients_model');
    }

    public function index() {
        $this->edit(0);
    }

    public function edit($id) {
        $data = array();
        $data['clients'] = $this->clients_model->getList();
        if ($id == 0) {
            // add new
            if ($this->input->post('sent')) {
                $this->clients_model->addClient($this->input->post('name'), $this->input->post('desc'));
                redirect('crm/clients', 'refresh');
            } else {
                $this->load->view('crm/clients/edit_view', $data);
            }
        } else {
            // edit
            if ($this->input->post('sent')) {
                $this->clients_model->updateClient($id, $this->input->post('name'), $this->input->post('desc'));
                redirect('crm/clients', 'refresh');
            } else {
                $data['user'] = $this->clients_model->getClient($id);
                $this->load->view('crm/clients/edit_view', $data);
            }
        }
    }

    public function del($id) {
        if (!$this->session->userdata('admin_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->clients_model->delClient($id);
        redirect('crm/clients', 'refresh');
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documents extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->load->model('crm/documents_model');
        $this->load->model('crm/clients_model');
    }

    public function index()
    {
        $data['clients'] = $this->clients_model->getList();
        $this->load->view('crm/documents/pick_client', $data);
        if ($this->input->post('sent')) {
            redirect('crm/documents/client/' . $this->input->post('client'), 'refresh');
        }
    }

    public function client($idClient, $idDocument = 0)
    {
        $this->edit($idClient, $idDocument);
    }

    public function edit($idClient, $id)
    {
        $data = array();
        $data['documents'] = $this->documents_model->getList($idClient);
        $data['client'] = $this->clients_model->getClient($idClient);

        if ($id == 0) {
            // add new
            if ($this->input->post('sent')) {
                $filename = $this->documents_model->uploadFile();
                $this->documents_model->addDocument($this->input->post('name'), $filename, $this->input->post('start'), $this->input->post('end'), $idClient);
                redirect('crm/documents/client/' . $idClient, 'refresh');
            } else {
                $this->load->view('crm/documents/edit_view', $data);
            }
        } else {
            // edit
            if ($this->input->post('sent')) {
                $filename = $this->documents_model->uploadFile();
                $this->documents_model->updateDocument($id, $this->input->post('name'), $filename, $this->input->post('start'), $this->input->post('end'), $idClient);
                redirect('crm/documents/client/' . $idClient, 'refresh');
            } else {
                $data['selected'] = $this->documents_model->getDocument($id);
                $this->load->view('crm/documents/edit_view', $data);
            }
        }
    }

    public function del($id)
    {
        $document = $this->documents_model->getDocument($id);
        $idClient = $document['id_client'];
        if (!$this->session->userdata('admin_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->documents_model->delDocument($id);
        redirect('crm/documents/client/' . $idClient, 'refresh');
    }

}

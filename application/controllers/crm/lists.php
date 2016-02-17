<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lists extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->load->model('crm/documents_model');
        $this->load->model('crm/lists_model');
        $this->load->model('warehouse/library_model');
    }

    public function document($idDocument)
    {
        $this->edit($idDocument);
    }

    public function edit($idDocument)
    {
        $data = array();
        $data['reqs'] = $this->lists_model->getList($idDocument, true, true);
        $data['bought'] = $this->lists_model->getList($idDocument, false, true);
        $data['products'] = $this->library_model->getList();
        $data['document'] = $this->documents_model->getDocument($idDocument);

            // add new
            if ($this->input->post('sent')) {
                $this->lists_model->addList($idDocument, $this->input->post('product'), $this->input->post('date'), $this->input->post('amount'), $this->input->post('type'));
                redirect($this->uri->uri_string());
            }

        $this->load->view('crm/lists/add_view', $data);
    }

    public function del($id)
    {
        $list = $this->lists_model->getListSingle($id);
        if (!$this->session->userdata('admin_lvl')) {
            die(redirect(base_url() . 'main/noaccess'));
        }
        $this->lists_model->delList($id);
        redirect('crm/lists/document/' . $list['id_document'], 'refresh');
    }

}

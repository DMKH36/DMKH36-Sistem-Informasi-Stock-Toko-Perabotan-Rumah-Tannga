<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("perusahaan_model");
        $this->load->library('form_validation');
        $this->load->model("admin_model");
        if($this->admin_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["merek"] = $this->perusahaan_model->getAll();
        $this->load->view("admin/perusahaan/list", $data);
    }

    public function add()
    {
        $merek = $this->perusahaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($merek->rules());

        if ($validation->run()) {
            $merek->save();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }

        $this->load->view("admin/perusahaan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/perusahaan');
       
        $merek = $this->perusahaan_model;
        $validation = $this->form_validation;
        $validation->set_rules($merek->rules());

        if ($validation->run()) {
            $merek->update();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }

        $data["merek"] = $merek->getById($id);
        if (!$data["merek"]) show_404();
        
        $this->load->view("admin/perusahaan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->perusahaan_model->delete($id)) {
            redirect(site_url('admin/perusahaan'));
        }
    }
}
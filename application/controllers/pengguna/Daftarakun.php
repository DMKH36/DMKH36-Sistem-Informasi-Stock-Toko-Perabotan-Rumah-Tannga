<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarakun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengguna_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pengguna"] = $this->pengguna_model->getAll();
        $this->load->view("pengguna/daftarakun", $data);
    }

    public function add()
    {
        $pengguna = $this->pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->save();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }

        $this->load->view("pengguna/login");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('pengguna/setting');
       
        $pengguna = $this->pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            $pengguna->update();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }

        $data["pengguna"] = $pengguna->getById($id);
        if (!$data["pengguna"]) show_404();
        
        $this->load->view("pengguna/setting", $data);
    }

}
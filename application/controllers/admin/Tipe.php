<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tipe_model');
        $this->load->model("admin_model");
        if($this->admin_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["tipe"] = $this->tipe_model->data_tabeltipe()->result();
        $this->load->view("admin/tipe/list", $data);
    }

}
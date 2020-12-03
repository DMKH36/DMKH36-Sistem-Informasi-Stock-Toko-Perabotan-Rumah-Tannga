<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipe extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tipe_model');
        $this->load->model("pengguna_model");
        if($this->pengguna_model->isNotLogin()) redirect(site_url('pengguna/login'));
    }

    public function index()
    {
        $data["tipe"] = $this->tipe_model->data_tabeltipe()->result();
        $this->load->view("pengguna/tipe/list", $data);
    }

}
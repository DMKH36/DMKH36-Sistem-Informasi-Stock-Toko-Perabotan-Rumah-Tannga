<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
        $this->load->model("pengguna_model");
        if($this->pengguna_model->isNotLogin()) redirect(site_url('pengguna/login'));
    }

    public function index()
    {
        $data["produk"] = $this->product_model->getAll();
        $this->load->view("pengguna/product/list", $data);
    }

}
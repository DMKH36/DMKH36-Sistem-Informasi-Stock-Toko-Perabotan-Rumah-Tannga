<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengguna_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->input->post()){
            if($this->pengguna_model->doLogin()) redirect(site_url('pengguna'));
        }
        $this->load->view("pengguna/login_page.php");
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('pengguna/login'));
    }
}
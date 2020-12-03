<?php

class Overview extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pengguna_model");
        if($this->pengguna_model->isNotLogin()) redirect(site_url('pengguna/login'));
	}

	public function index()
	{
        $this->load->view("pengguna/overview");
	}
}
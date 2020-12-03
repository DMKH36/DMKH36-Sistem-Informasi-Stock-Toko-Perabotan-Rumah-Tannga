<?php

class Overview extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
        if($this->admin_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
        $this->load->view("admin/overview");
	}
}
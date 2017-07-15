<?php

class Filters extends CI_Controller {

	public function index()
	{

	}

	public function filter_service() {
		$this->load->helper('form');
		$this->load->model('servicesmodel','sm');
		$all_services = $this->sm->all_services();
		$this->load->view('admin/filter_service',['all_services'=>$all_services]);
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}
	}

}
?>

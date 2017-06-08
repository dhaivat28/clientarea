<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('admin_id'))
		{			return redirect('adminlogin');}
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function addclient() {
		$this->load->helper('form');
		$this->load->view('admin/add_client');
	}

}

?>

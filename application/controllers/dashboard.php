<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}
}

?>

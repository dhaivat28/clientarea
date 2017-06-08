<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function addclient() {
		$this->load->helper('form');
		$this->load->view('admin/add_client');
	}

	public function storeclient()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_client')){
			$data = $this->input->post();
			unset($data['submit']);
			$this->load->model('articlesmodel','atm');
			$this->_flashandredirect($this->atm->article_insert($data),"Added","Add");
			} else {
			$this->load->view('admin/add_client');
		}
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}

	}


}

?>

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
			$this->load->model('dashboardactivitymodel','damodel');
			$this->_flashandredirect($this->damodel->client_insert($data),"Added","Add");
			} else {
			$this->load->view('admin/add_client');
		}
	}

	private function _flashandredirect($success,$success_msg,$failure_msg)
	{
	if($success){
		$this->session->set_flashdata('feedback',"Client $success_msg Successfully");
		$this->session->set_flashdata('feedback_class','alert-success');
	} else {
		$this->session->set_flashdata('feedback',"Failed to $failure_msg client, Please try again");
		$this->session->set_flashdata('feedback_class','alert-danger');
	}
	return redirect('dashboard/addclient');
	}


	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}

	}


}

?>

<?php

class Domainandhosting extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function add_domain() {
		$this->load->helper('form');
		$this->load->view('admin/add_domain');
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
		return redirect('dashboard/manageclient');
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}

	}


}

?>

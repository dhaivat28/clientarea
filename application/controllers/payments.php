<?php

class Payments extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function manage_payments()
	{
		$this->load->helper('form');
		$this->load->model('paymentsmodel','pyml');
		$all_payments = $this->pyml->all_payments();
		$this->load->view('admin/manage_payments',['all_payments'=>$all_payments]);
	}

	public function add_payment($service_id) {
		$this->load->helper('form');
		$this->load->model('paymentsmodel','sm');
		$this->load->view('admin/add_payment');
	}

	private function _flashandredirect($success,$success_msg,$failure_msg)
	{
	if($success){
		$this->session->set_flashdata('feedback',"Service $success_msg Successfully");
		$this->session->set_flashdata('feedback_class','alert-success');
	} else {
		$this->session->set_flashdata('feedback',"Failed to $failure_msg Service, Please try again");
		$this->session->set_flashdata('feedback_class','alert-danger');
	}
		return redirect('services/manage_services');
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}
	}


}

?>

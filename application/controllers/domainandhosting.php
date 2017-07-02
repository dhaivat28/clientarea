<?php

class Domainandhosting extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function add_domain() {
		$this->load->helper('form');
		$this->load->model('domainmodel','dm');
		$dropdown_list = $this->dm->dropdown_list();
		$this->load->view('admin/add_domain',['dropdown_list'=>$dropdown_list]);
	}


	public function store_domain()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_domain')){
			$data = $this->input->post();
			unset($data['submit']);
			$this->load->model('domainmodel','dm');
			$this->dm->add_domain($data);

			// $this->_flashandredirect($this->atm->article_insert($data),"Added","Add");
			} else {
			$this->load->view('admin/add_domain');
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

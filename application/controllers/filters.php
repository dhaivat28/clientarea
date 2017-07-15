<?php

class Filters extends CI_Controller {

	public function index()
	{

	}

	public function filter_service() {
		$this->load->helper('form');
		$this->load->model('clientmodel','cm');
		$this->load->model('servicesmodel','sm');
		$this->load->model('productsmodel','prs');

		$dropdown_list = $this->sm->dropdown_list();
		$p_dropdown = $this->prs->p_dropdown();

		$all_services = $this->sm->all_services();


		$this->load->view('admin/filter_service',['all_services'=>$all_services,'dropdown_list'=>$dropdown_list,'p_dropdown'=>$p_dropdown]);
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}
	}

}
?>

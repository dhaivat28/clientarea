<?php

class Filters extends CI_Controller {

	public function index()
	{
			$this->load->helper('form');
			$this->load->model('servicesmodel','sm');
			$this->load->model('productsmodel','prs');
			$this->load->model('loginmodel','lm');
			$this->load->model('clientmodel','cm');
			$client_dropdown = $this->sm->dropdown_list();
			$product_dropdown = $this->prs->p_dropdown();
			$admin_dropdown = $this->lm->admin_dropdown();
			$filtered_data = $this->sm->all_services();


			$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
	}

	public function filter_by_product() {
		$this->load->helper('form');
		$this->load->model('filtermodel','fm');
		$product_id = $this->input->post('product_id');
		$filtered_data = $this->fm->filter_by_product($product_id);
		$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data]);

	}



	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}

	}

}
?>

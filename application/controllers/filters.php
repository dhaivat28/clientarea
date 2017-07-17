<?php

class Filters extends CI_Controller {

	public function index()
	{
			$filtered_data = $this->sm->all_services();
			// Start dropdown package
			$client_dropdown = $this->cm->client_dropdown();
			$product_dropdown = $this->pm->p_dropdown();
			$admin_dropdown = $this->lm->admin_dropdown();
			// End dropdown package
			$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
	}

	public function filter_by_product() {
		$product_id = $this->input->post('product_id');
		$filtered_data = $this->fm->filter_by_product($product_id);
		// Start dropdown package
		$client_dropdown = $this->cm->client_dropdown();
		$product_dropdown = $this->pm->p_dropdown();
		$admin_dropdown = $this->lm->admin_dropdown();
		// End dropdown package
		$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
	}

	public function filter_by_client() {
		$client_id = $this->input->post('client_id');
		$filtered_data = $this->fm->filter_by_client($client_id);
		// Start dropdown package
		$client_dropdown = $this->cm->client_dropdown();
		$product_dropdown = $this->pm->p_dropdown();
		$admin_dropdown = $this->lm->admin_dropdown();
		// End dropdown package
		$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
	}

	public function filter_by_admin() {
		$admin_id = $this->input->post('admin_id');
		$filtered_data = $this->fm->filter_by_admin($admin_id);
		// Start dropdown package
		$client_dropdown = $this->cm->client_dropdown();
		$product_dropdown = $this->pm->p_dropdown();
		$admin_dropdown = $this->lm->admin_dropdown();
		// End dropdown package
		$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
	}

	public function filter_by_status() {
		$status = $this->input->post('status');
		// Start dropdown package
		$client_dropdown = $this->cm->client_dropdown();
		$product_dropdown = $this->pm->p_dropdown();
		$admin_dropdown = $this->lm->admin_dropdown();
		// End dropdown package

		if($status == "90" || $status == "180")
		{
			$filtered_data = $this->fm->filter_by_status_days($status);
			$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
		}
		elseif ($status == "180plus")
		{
			$lower_range = 180;
			$filtered_data = $this->fm->filter_by_status_limits($lower_range);
			$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
		}

		else
		{
			$filtered_data = $this->fm->filter_by_status($status);
			$this->load->view('admin/filter_service',['filtered_data'=>$filtered_data,'client_dropdown'=>$client_dropdown,'product_dropdown'=>$product_dropdown,'admin_dropdown'=>$admin_dropdown]);
				}
	}

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}

		$this->load->helper('form');
		$this->load->model('productsmodel','pm');
		$this->load->model('loginmodel','lm');
		$this->load->model('clientmodel','cm');
		$this->load->model('servicesmodel','sm');
		$this->load->model('filtermodel','fm');
	}

}
?>

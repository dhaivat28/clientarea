<?php

class Sales extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->model('salesmodel','slm');
		$all_sales = $this->slm->all_sales();
		$this->load->view('admin/view_sales',['all_sales'=>$all_sales]);
	}

	public function filter_by_sales()
	{
			$this->load->helper('form');
			$this->load->model('salesmodel','slm');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if($this->form_validation->run('filter_sale_date')){
				$start = $this->input->post('start_date');
				$end = $this->input->post('end_date');
				$all_sales = $this->slm->filter_sales($start,$end);
				$this->load->view('admin/view_sales',['all_sales'=>$all_sales]);
			} else {
				$all_sales = $this->slm->all_sales();
				$this->load->view('admin/view_sales',['all_sales'=>$all_sales]);
			}
	}

	public function filter_by_month()
	{
			$this->load->helper('form');
			$this->load->model('salesmodel','slm');
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
			if($this->form_validation->run('filter_sale_month')){
				$month = $this->input->post('month');
			 	$year = $this->input->post('year');
				$all_sales = $this->slm->filter_sales_month($month,$year);
				$this->load->view('admin/view_sales',['all_sales'=>$all_sales]);
			} else {
				$all_sales = $this->slm->all_sales();
				$this->load->view('admin/view_sales',['all_sales'=>$all_sales]);
			}
	}

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('admin_id'))
		{
			return redirect('adminlogin');
		}
		$this->output->nocache();
	}


}
?>

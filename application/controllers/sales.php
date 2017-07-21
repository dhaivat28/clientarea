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

}
?>

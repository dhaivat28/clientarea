<?php

class Sales extends CI_Controller {

	public function index()
	{
		$this->load->model('salesmodel','slm');
		$all_sales = $this->slm->all_sales();
		$this->load->view('admin/view_sales',['all_sales'=>$all_sales]);
	}

}
?>

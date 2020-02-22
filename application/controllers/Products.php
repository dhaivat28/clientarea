<?php

class Products extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->model('productsmodel','prs');
		$all_products = $this->prs->all_products();
		$this->load->view('admin/manage_products',['all_products'=>$all_products]);
	}

	public function add_product() {
		$this->load->helper('form');
		$this->load->view('admin/add_product');
	}

	public function store_product()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_product')){
			$data = $this->input->post();
 			unset($data['submit']);
			$this->load->model('productsmodel','prs');
			$now = new DateTime();
		   $now->setTimezone(new DateTimezone('Asia/Kolkata'));
		   $n = $now->format('Y-m-d H:i:s');
			$product_array= array('added_on' => $n);
			$data = array_merge($data, $product_array);
			$this->_flashandredirect($this->prs->add_product($data),"Added","Add");
			} else {
			$this->load->view('admin/add_product');
		}
	}

	public function delete_product($product_id) {
		$this->load->model('productsmodel','prs');
		$this->_flashandredirect($this->prs->delete_product($product_id),"Deleted","Delete");
	}

	private function _flashandredirect($success,$success_msg,$failure_msg)
	{
	if($success){
		$this->session->set_flashdata('feedback',"Product $success_msg Successfully");
		$this->session->set_flashdata('feedback_class','alert-success');
	} else {
		$this->session->set_flashdata('feedback',"Failed to $failure_msg Product, Please try again");
		$this->session->set_flashdata('feedback_class','alert-danger');
	}
		return redirect('products');
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}

		$this->output->nocache();
	}


}

?>

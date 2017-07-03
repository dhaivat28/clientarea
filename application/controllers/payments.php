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
		$this->load->model('servicesmodel','sm');
		$all_services = $this->sm->all_services();
		$this->load->view('admin/manage_services',['all_services'=>$all_services]);

	}

	public function add_payment() {
		$this->load->helper('form');
		// $this->load->model('servicesmodel','sm');
		// $dropdown_list = $this->sm->dropdown_list();
		// $this->load->view('admin/add_service',['dropdown_list'=>$dropdown_list]);
		$this->load->view('admin/add_payment');
	}

	public function store_service()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_domain')){
			$data = $this->input->post();
		 	unset($data['submit']);
			$this->load->model('servicesmodel','sm');
			$c_id = $this->input->post('client_id');
			$cl_name= $this->sm->get_c_name($c_id);
			$my_values = array();
			foreach($cl_name as $row)
			{	$my_values[] = $row->cname; }
			$client_name = $my_values[0];
			$client_name_array = array('client_name' => $client_name);
			$data = array_merge($data, $client_name_array);
			$p_date = $this->input->post('p_date');
			$length = $this->input->post('years');
			$expiry_date = date('Y-m-d', strtotime($length, strtotime($p_date)));
			$date_expiry_array = array('expiry_date' => $expiry_date);
   		$data = array_merge($data, $date_expiry_array);
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		 	$n = $now->format('Y-m-d H:i:s');
			$now_date = array('added_on' => $n);
   		$data = array_merge($data, $now_date);
 			$this->_flashandredirect($this->sm->add_domain($data),"Added","Add");
			} else {
			$this->load->view('admin/add_domain');
		}
	}

	public function delete_service($service_id) {
			$this->load->model('servicesmodel','dm');
			$this->_flashandredirect($this->dm->delete_service($service_id),"Deleted","Delete");
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

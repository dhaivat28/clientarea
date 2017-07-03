<?php

class Services extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function manage_services()
	{
		$this->load->helper('form');
		$this->load->model('servicesmodel','sm');
		$all_services = $this->sm->all_services();
		$this->load->view('admin/manage_services',['all_services'=>$all_services]);

	}

	public function add_service() {
		$this->load->helper('form');
		$this->load->model('servicesmodel','sm');
		$dropdown_list = $this->sm->dropdown_list();
		$this->load->view('admin/add_service',['dropdown_list'=>$dropdown_list]);
	}

	public function store_service()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_domain')){
			$data = $this->input->post();
			$payment_data = $this->input->post();
			unset($data['submit']);
			$this->load->model('servicesmodel','sm');
			$c_id = $this->input->post('client_id');
			$client_name= $this->sm->get_c_name($c_id);
			$p_date = $this->input->post('p_date');
			$length = $this->input->post('years');
			$expiry_date = date('Y-m-d', strtotime($length, strtotime($p_date)));
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		 	$n = $now->format('Y-m-d H:i:s');
			$final_array= array('client_name' => $client_name,'expiry_date' => $expiry_date,'added_on' => $n);
			$data = array_merge($data, $final_array);

			// main service execution
			$this->sm->add_service($data);

			$this->load->model('paymentsmodel','pyml');
			$d = $this->input->post('domain_name');
			$s_id = $this->pyml->get_s_id($d);
			$p_status = "pending";
			$payment_array= array('service_id' =>$s_id,'p_status' => $p_status,'added_on' => $n);

			$this->_flashandredirect($this->pyml->add_payment($payment_array),"Added","Add");
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

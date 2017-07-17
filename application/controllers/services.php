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
		$this->load->model('productsmodel','prs');
		$dropdown_list = $this->sm->dropdown_list();
		$p_dropdown = $this->prs->p_dropdown();
		$this->load->view('admin/add_service',['dropdown_list'=>$dropdown_list,'p_dropdown'=>$p_dropdown]);
	}

	public function store_service()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if($this->form_validation->run('add_service')){
			$this->load->model('servicesmodel','sm');
			$admin_id = $this->input->post('admin_id');
			$admin_name = $this->sm->get_admin_name($admin_id);
			$data = $this->input->post();
			$payment_data = $this->input->post();
			unset($data['submit']);
			$c_id = $this->input->post('client_id');
			$client_name= $this->sm->get_c_name($c_id);
			$p_date = $this->input->post('p_date');
			$r_id = mt_rand() * time();
			$service_id = substr($r_id, 0, 9);
			$p_id = $this->input->post('product_id');
			$product_name= $this->sm->get_p_name($p_id);
			$length = $this->input->post('years');
			$expiry_date = date('Y-m-d', strtotime($length, strtotime($p_date)));
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		 	$n = $now->format('Y-m-d H:i:s');
			$service_status = "Active";

			$today = strtotime($n);
			$ex_d = strtotime($expiry_date);

			if($today >= $ex_d)
			{
				$this->session->set_flashdata('expired','You Cannot add an already expired service');
				$this->session->set_flashdata('expired_service','alert-danger');
				return redirect('services/manage_services');
				
			}
			else {
				//-----------------------------------------------//
					$today = strtotime($n);
					$ex_d = strtotime($expiry_date);
					$timeDiff = abs($ex_d - $today);
					$days_left = $timeDiff/86400;
					$days_left = intval($days_left);
				//-----------------------------------------------//
			}

			$final_array= array('service_status'=>$service_status,'client_name' => $client_name,'expiry_date' => $expiry_date,'added_on' => $n,'added_by'=>$admin_name,'service_id'=>$service_id,'product_name'=>$product_name,'days_left'=>$days_left);
			$data = array_merge($data, $final_array);
			// main service execution
			$done = $this->sm->add_service($data);
			// billing module
			$this->load->model('paymentsmodel','pyml');
			$service_charges = $this->pyml->calculate_charges($p_id);
			$l = substr($length, 1, 2);
			$service_charges = $l * $service_charges;
			// payment
			$this->load->model('paymentsmodel','pyml');
			$d = $this->input->post('service_name');
			$service_details = $client_name." | ".$length." | ".$d;
			$p_status = "no payments yet";
			$payment_array= array('admin_id'=>$admin_id,'added_by'=>$admin_name,'service_id' =>$service_id,'p_status' => $p_status,'service_charges'=>$service_charges,'amount_left'=>$service_charges,'service_details'=>$service_details);
				if($done)
				{
					// payment execution
					$this->_flashandredirect($this->pyml->add_payment($payment_array),"Added","Add");
				}
			}
			else {
				$this->load->model('servicesmodel','sm');
				$this->load->model('productsmodel','prs');
				$dropdown_list = $this->sm->dropdown_list();
				$p_dropdown = $this->prs->p_dropdown();
				$this->load->view('admin/add_service',['dropdown_list'=>$dropdown_list,'p_dropdown'=>$p_dropdown]);
			}

	}	//end of main function

	public function delete_service($service_id) {
			$this->load->model('servicesmodel','dm');
			$this->load->model('paymentsmodel','pm');

			$delete_payment = $this->pm->delete_payment($service_id);
			if($delete_payment) {
				$this->_flashandredirect($this->dm->delete_service($service_id),"Deleted","Delete");
			}

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

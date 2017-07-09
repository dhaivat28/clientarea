<?php

class Payments extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function check_log($service_id)
	{
		$this->load->helper('form');
 		$this->load->model('paymentsmodel','pyml');
		$all_transactions = $this->pyml->check_log($service_id);
		$this->load->view('admin/view_log',['all_transactions'=>$all_transactions]);
	}

	public function manage_payments()
	{
		$this->load->helper('form');
		$this->load->model('paymentsmodel','pyml');
		$all_payments = $this->pyml->all_payments();
		$this->load->view('admin/manage_payments',['all_payments'=>$all_payments]);
	}

	public function add_payment($service_id) {
		$this->load->helper('form');
		$this->load->model('paymentsmodel','pyml');
		$tr_details = $this->pyml->get_details($service_id);
		$this->load->view('admin/add_payment',['tr_details'=>$tr_details]);
	}

	public function update_payment($service_id) {
		$this->load->library('form_validation');
		$this->load->model('paymentsmodel','pyml');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if($this->form_validation->run('add_payment'))
		{
			$data = $this->input->post();
			unset($data['submit']);
			$this->load->model('servicesmodel','sm');
			$admin_id = $this->input->post('admin_id');
			$admin_name = $this->sm->get_admin_name($admin_id);
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Kolkata'));

			$tr_date = $now->format('Y-m-d H:i:s');
			$tr_id = mt_rand()*time();
			$amount_pay = $this->input->post('amount_pay');
			$raw_pay = $this->input->post('amount_pay');
			$amount_left = $this->input->post('amount_left');
			unset($data['amount_pay']);

			if($amount_pay<=$amount_left)
			{

				$final = $amount_left-$amount_pay;
				if($final==0)
				{
					$p_status = "done";
				} else {
					$p_status = "partial";
				}

				$am_bl = $this->input->post('amount_balance');
				$amount_pay = $amount_pay + $am_bl;
				unset($data['amount_balance']);

				$pay_array= array(
					'admin_id' => $admin_id,
					'added_by' => $admin_name,
					'tr_id' => $tr_id,
					'tr_date'=> $tr_date,
					'p_status'=> $p_status,
					'amount_left'=> $final,
					'amount_paid'=> $amount_pay);

				$data = array_merge($data, $pay_array);

				// print_r($data); exit;

				$main_payemnt = $this->pyml->update_payment($service_id,$data);

				$p_method = $this->input->post('p_method');
				$log_array= array(
					'admin_id' => $admin_id,
					'added_by' => $admin_name,
					'tr_id' => $tr_id,
					'tr_date'=> $tr_date,
					'service_id'=> $service_id,
					'p_method'=> $p_method,
					'amount_left'=> $final,
					'amount_paid'=> $raw_pay);

					if($main_payemnt)
					{
						$this->_flashandredirect($this->pyml->payment_log($log_array),"paid","paid");
					}

			}	else {

				$this->session->set_flashdata('incorrect_amount','payment amount cannot be greater than the amount left to pay');
				$this->session->set_flashdata('i_class','alert-danger');
				return redirect('payments/manage_payments');
			}

		} else {
			$tr_details = $this->pyml->get_details($service_id);
			$this->load->view('admin/add_payment',['tr_details'=>$tr_details]);
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
		return redirect('payments/manage_payments');
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}
	}


}

?>

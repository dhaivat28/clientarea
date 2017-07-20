<?php

class Client extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/dashboard');
	}

	public function manageclient() {
		$this->load->helper('form');
		$this->load->model('clientmodel','damodel');
		$all_clients = $this->damodel->client_list();
		$this->load->view('admin/manage_client',['all_clients'=>$all_clients]);
	}

	public function addclient() {
		$this->load->helper('form');
		$this->load->view('admin/add_client');
	}

	public function storeclient()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_client')){
			$data = $this->input->post();
			unset($data['submit']);
			$this->load->model('clientmodel','damodel');
			$now = new DateTime();
			$now->setTimezone(new DateTimezone('Asia/Kolkata'));
			$n = $now->format('Y-m-d H:i:s');
			$now_date = array('created_at' => $n);
			$data = array_merge($data, $now_date);

			$this->_flashandredirect($this->damodel->client_insert($data),"Added","Add");
			} else {
			$this->load->view('admin/add_client');
		}
	}

	/*------------------------------------  Edit Client ------------------------------*/

	public function edit_client($client_id)
	{
		$this->load->helper('form');
		$this->load->model('clientmodel','damodel');
		$find_client = $this->damodel->find_client($client_id);
		$this->load->view('admin/edit_client',['find_client'=>$find_client]);
	}

	public function updateclient($client_id)
	{
		$this->load->library('form_validation');
		$this->load->model('clientmodel','damodel');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('add_client')){
			$data = $this->input->post();
			unset($data['submit']);
			$this->_flashandredirect($this->damodel->update_client($client_id,$data),"Updated","Update");
		} else {
			$find_client = $this->damodel->find_client($client_id);
			$this->load->view('admin/edit_client',['find_client'=>$find_client]);
		}
	}

	public function delete_client($client_id)
	{
	$this->load->model('clientmodel','damodel');
	$this->_flashandredirect($this->damodel->delete_client($client_id),"Deleted","Delete");
	}

	private function _flashandredirect($success,$success_msg,$failure_msg)
	{
	if($success){
		$this->session->set_flashdata('feedback',"Client $success_msg Successfully");
		$this->session->set_flashdata('feedback_class','alert-success');
	} else {
		$this->session->set_flashdata('feedback',"Failed to $failure_msg client, Please try again");
		$this->session->set_flashdata('feedback_class','alert-danger');
	}
		return redirect('client/manageclient');
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

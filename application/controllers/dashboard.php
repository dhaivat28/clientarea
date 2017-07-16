<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');


		// $this->load->model('dashboardmodel','dm');
		// // print_r($services);exit;
		// $now = new DateTime();
		// $now->setTimezone(new DateTimezone('Asia/Kolkata'));
		// $today = $now->format('Y-m-d H:i:s');
		// $today = strtotime($today);
		// $services = $this->dm->get_services();
		// foreach ($services as $key) {
		// 	$expiry_date = strtotime($key->expiry_date);
		// 	$timeDiff = abs($expiry_date - $today);
		// 	$days_left = $timeDiff/86400;
		// 	$days_left = intval($days_left);
		// }

		$this->load->view('admin/dashboard');
	}

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
		{return redirect('adminlogin');}
	}

}
?>

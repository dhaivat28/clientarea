<?php

class Dashboard extends CI_Controller {

	public function index()
	{

		//---------------- CRON JOB for service expiry --------------//
		$this->load->model('dashboardmodel','dm');
		$now = new DateTime();
		$now->setTimezone(new DateTimezone('Asia/Kolkata'));
		$today = $now->format('Y-m-d H:i:s');
		$today = strtotime($today);
		$services = $this->dm->get_services();
		
		foreach ($services as $key) {
			$expiry_date = strtotime($key->expiry_date);
			$timeDiff = abs($expiry_date - $today);
			$days_left = $timeDiff/86400;
			echo $days_left = intval($days_left);
			$service_id = $key->service_id;
			$execute = $this->dm->update_expiry($service_id,$days_left);
		}

		//---------------- CRON JOB for service expiry --------------//

		$this->load->view('admin/dashboard');
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

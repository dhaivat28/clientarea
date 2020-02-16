<?php

class Adminlogin extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('admin_id'))
		{
			return redirect('dashboard');
		}
		else {
			$this->load->helper('form');
			$this->load->view('public/admin_login');
		}
		// load
		$this->load->database();
		print_r($this->db);
	}

	public function admin_login_process()
	{
		if($this->session->userdata('admin_id'))
		{
			return redirect('dashboard');
		}
		else {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if ($this->form_validation->run('admin_login')){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->load->model('loginmodel','lgmodel');
			$admin_id = $this->lgmodel->validate_adminlogin($email,$password);

			//prnt Admin id
			echo $admin_id;

			if($admin_id) {
				$this->session->set_userdata('admin_id',$admin_id);
				return redirect('dashboard');
				} else {
				$this->session->set_flashdata('login_failed','Invalid Username or Password');
				return redirect('adminlogin');
			}
		}	else {
			$this->load->view('public/admin_login');
		}

	}
	}

	public function admin_logout () {
		$this->session->unset_userdata('admin_id');
		return redirect('adminlogin');
		$this->session->sess_destroy();
	}



}

?>

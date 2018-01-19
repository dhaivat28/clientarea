<?php

class Mailtoclient extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('admin/mail_custom');
	}

	public function mail_exec()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('mail_validate')){
			$data = $this->input->post();
			unset($data['submit']);
			$this->load->model('mailmodel','mamodel');
			$this->mamodel->shoot_mail($data);

			}
			 else {
			$this->load->view('admin/mail_custom');
		}
	}

}
?>

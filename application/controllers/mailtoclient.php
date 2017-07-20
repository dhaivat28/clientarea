<?php

class Mailtoclient extends CI_Controller {

	public function index()
	{
		$this->load->library('email');
		$subject = 'Urgent! Domain About to Expire';
		$message = '<p>This message has been sent for testing purposes.</p>';
		$result = $this->email
     ->from('aspironwebmailer@gmail.com')
     ->reply_to('aspironweb@gmail.com')    // Optional, an account where a human being reads.
     ->to('dhaivat28@gmail.com')
     ->subject($subject)
     ->message($message)
     ->send();
	}
}
?>

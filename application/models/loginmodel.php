<?php

class Loginmodel extends CI_Model {

	public function validate_adminlogin($email,$password)
	{
		$sha1_pass =sha1($password);
		$query = $this->db->where(['email'=>$email,'password'=>$sha1_pass])
							->get('admin');

		if($query->num_rows()) {
		return $query->row()->admin_id;
		} else {
		return FALSE;
		}
	}

	public function articles_list()
	{
		$cid = $this->session->userdata('client_user_id');

		$query= $this->db
							->select('title')
							->select('body')
							->select('created_at')
							->select('article_id')
							->from('articles')
							->where('client_user_id',$cid)
							->get();
		return $query->result();

	}


}
?>

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

	public function admin_dropdown()
	{
		$query= $this->db
							->select('admin_id')
							->select('admin_name')
							->from('admin')
							->get();
		return $query->result_array();
	}


}

?>

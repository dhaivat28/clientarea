<?php

class Dashboardmodel extends CI_Model {

	public function get_services()
	{
		$a_id = $this->session->userdata('admin_id');
		$query= $this->db
							->select('*')
							->from('services')
							->order_by("op_id", "ASC")
							->get();
		return $query->result();
	}

}
?>

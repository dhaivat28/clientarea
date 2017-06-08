<?php

class Dashboardactivitymodel extends CI_Model {

	public function client_insert($data)
	{
		return $status = $this->db->insert('clients',$data);
	}

	public function client_list()
	{
		$a_id = $this->session->userdata('admin_id');
		$query= $this->db
							->select('client_id')
							->select('cname')
							->select('email')
							->select('mobile')
							->select('remarks')
							->from('clients')
							->where('admin_id',$a_id)
							->get();
		return $query->result();
	}


}

?>

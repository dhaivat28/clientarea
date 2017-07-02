<?php

class Domainmodel extends CI_Model {

	public function dropdown_list() {
		$a_id = $this->session->userdata('admin_id');
		$query= $this->db
							->select('client_id')
							->select('cname')
							->from('clients')
							->where('admin_id',$a_id)
							->get();
		return $query->result_array();
	}


	public function add_domain($data)
	{
		print_r($data);
		return $status = $this->db->insert('domains',$data);
	}


}
?>

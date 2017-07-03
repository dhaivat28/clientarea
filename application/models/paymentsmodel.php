<?php

class Paymentsmodel extends CI_Model {

	public function get_s_id($d){

		$query= $this->db
							->select('service_id')
							->from('services')
							->where('domain_name',$d)
							->get();
		return $query->row()->service_id;

	}

	public function add_payment($data)
	{
		return $status = $this->db->insert('payments',$data);
	}

}
?>

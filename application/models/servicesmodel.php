<?php

class Servicesmodel extends CI_Model {

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

	public function get_c_name($c_id)
	{
		$query= $this->db
							->select('cname')
							->from('clients')
							->where('client_id',$c_id)
							->get();
		return $query->result();
	}

	public function add_domain($data)
	{
		return $status = $this->db->insert('services',$data);
	}

	public function all_services()
	{
		$a_id = $this->session->userdata('admin_id');
		$query= $this->db
							->select('added_on')
							->select('service_id')
							->select('domain_name')
							->select('client_id')
							->select('client_name')
							->select('p_date')
							->select('service_type')
							->select('years')
							->select('expiry_date')
							->from('services')
							->where('admin_id',$a_id)
							->get();
		return $query->result();
	}

	public function delete_service($service_id) {
		$query = $this->db->delete('services',['service_id'=>$service_id]);
		return $query;
	}



}
?>
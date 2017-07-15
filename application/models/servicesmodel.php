<?php

class Servicesmodel extends CI_Model {

	public function dropdown_list() {
		$query= $this->db
							->select('client_id')
							->select('cname')
							->from('clients')
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
		return $query->row()->cname;
	}

	public function get_p_name($p_id)
	{
		$query= $this->db
							->select('product_name')
							->from('products')
							->where('product_id',$p_id)
							->get();
		return $query->row()->product_name;
	}

	public function add_service($data)
	{
		return $status = $this->db->insert('services',$data);
	}

	public function all_services()
	{
		$a_id = $this->session->userdata('admin_id');
		$query= $this->db
							->select('added_on')
							->select('added_by')
							->select('service_id')
							->select('service_name')
							->select('service_status')
							->select('client_id')
							->select('client_name')
							->select('p_date')
							->select('product_id')
							->select('product_name')
							->select('years')
							->select('expiry_date')
							->from('services')
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}

	public function get_admin_name($admin_id)
	{
		$query= $this->db
							->select('admin_name')
							->from('admin')
							->where('admin_id',$admin_id)
							->get();
		return $query->row()->admin_name;
	}

	public function delete_service($service_id) {
		$query = $this->db->delete('services',['service_id'=>$service_id]);
		return $query;
	}

	public function all_services_fromid($service_id)
	{

		$query= $this->db
							->select('added_on')
							->select('added_by')
							->select('service_id')
							->select('service_name')
							->select('client_id')
							->select('client_name')
							->select('p_date')
							->select('product_id')
							->select('years')
							->select('expiry_date')
							->from('services')
							->where('service_id',$service_id)
							->get();
		return $query->result();
	}


}
?>

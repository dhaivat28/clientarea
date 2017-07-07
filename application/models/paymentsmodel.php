<?php

class Paymentsmodel extends CI_Model {

	public function get_s_id($d){

		$query= $this->db
							->select('service_id')
							->from('services')
							->where('service_name',$d)
							->get();
		return $query->row()->service_id;
	}

	public function all_payments()
	{
		$query= $this->db
							->select('admin_id')
							->select('added_by')
							->select('added_on')
							->select('service_id')
							->select('tr_id')
							->select('tr_date')
							->select('service_charges')
							->select('amount_paid')
							->select('p_status')
							->select('p_method')
							->from('payments')
							->get();
		return $query->result();
	}

	public function add_payment($data)
	{
		return $status = $this->db->insert('payments',$data);
	}

	public function calculate_charges($p_id) {
		$query= $this->db
							->select('product_mrp')
							->from('products')
							->where('product_id',$p_id)
							->get();
		return $query->row()->product_mrp;
	}

}
?>

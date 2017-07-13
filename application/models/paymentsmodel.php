<?php

class Paymentsmodel extends CI_Model {

	public function all_payments()
	{
		$query= $this->db
							->select('admin_id')
							->select('added_by')
							->select('service_id')
							->select('service_details')
							->select('tr_id')
							->select('tr_date')
							->select('service_charges')
							->select('amount_paid')
							->select('p_status')
							->select('p_method')
							->select('amount_left')
							->from('payments')
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}

	public function add_payment($data)
	{
		return $status = $this->db->insert('payments',$data);
	}

	public function payment_log($log_array)
	{
		return $status = $this->db->insert('payments_log',$log_array);
	}

	public function calculate_charges($p_id) {
		$query= $this->db
							->select('product_mrp')
							->from('products')
							->where('product_id',$p_id)
							->get();
		return $query->row()->product_mrp;
	}

	public function get_details($service_id) {

		$query = $this->db
							->select('added_by')
							->select('tr_id')
							->select('tr_date')
							->select('service_id')
							->select('service_charges')
							->select('amount_left')
							->select('amount_paid')
							->select('p_method')
							->where('service_id',$service_id)
							->get('payments');
		return $query->row();
	}

	public function update_payment($service_id,Array $data)
	{
		return $this->db
					->where('service_id',$service_id)
					->update('payments',$data);
	}

	public function check_log($service_id)
	{
		$query = $this->db
							->select('added_by')
							->select('tr_id')
							->select('tr_date')
							->select('service_id')
							->select('amount_left')
							->select('amount_paid')
							->select('p_method')
							->where('service_id',$service_id)
							->order_by("op_id", "desc")
							->get('payments_log');
		return $query->result();
	}

}
?>

<?php

class Filtermodel extends CI_Model {

	public function filter_by_product($product_id) {

		$query= $this->db
							->select('*')
							->from('services')
							->where('product_id',$product_id)
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}

	public function filter_by_client($client_id) {

		$query= $this->db
							->select('*')
							->from('services')
							->where('client_id',$client_id)
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}

	public function filter_by_admin($admin_id) {

		$query= $this->db
							->select('*')
							->from('services')
							->where('admin_id',$admin_id)
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}

	public function filter_by_status($status) {

		$query= $this->db
							->select('*')
							->from('services')
							->where('service_status',$status)
							->order_by("days_left", "AESC")
							->get();
		return $query->result();
	}

	public function filter_by_status_days($status) {

		$query= $this->db
							->select('*')
							->from('services')
							->where('days_left <=',$status)
							->order_by("days_left", "AESC")
							->get();
		return $query->result();
	}

	public function filter_by_status_limits($lower_range,$upper_range) {

		$query= $this->db
							->select('*')
							->from('services')
							->where('days_left >=',$lower_range)
							->where('days_left <=',$upper_range)
							->order_by("days_left", "AESC")
							->get();
		return $query->result();
	}

}

?>

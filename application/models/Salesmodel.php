<?php

class Salesmodel extends CI_Model {

	public function all_sales()
	{
		$query= $this->db
							->select('*')
							->from('sales')
							->where('received',"TRUE")
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}

	public function filter_sales($start,$end) {

		$query= $this->db
							->select('*')
							->from('sales')
							->where('received_date >=',$start)
							->where('received_date <=',$end)
							->where('received',"TRUE")
							->order_by("op_id", "AESC")
							->get();
		return $query->result();
	}

	public function filter_sales_month($month,$year) {
		$query= $this->db
							->select('*')
							->from('sales')
							->where('month(received_date) =',$month)
							->where('year(received_date) =',$year)
							->where('received',"TRUE")
							->order_by("op_id", "AESC")
							->get();
		return $query->result();
	}



}
?>

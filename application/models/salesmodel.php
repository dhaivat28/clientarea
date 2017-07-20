<?php

class Salesmodel extends CI_Model {

	public function all_sales()
	{
		$query= $this->db
							->select('*')
							->from('sales')
							->order_by("op_id", "desc")
							->get();
		return $query->result();
	}



}
?>

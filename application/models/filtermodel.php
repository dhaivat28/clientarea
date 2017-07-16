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


}

?>

<?php

class Productsmodel extends CI_Model {

	public function all_products()
	{
		$query= $this->db

							->select('product_id')
							->select('added_on')
							->select('product_name')
							->select('product_mrp')
							->select('profit')
							->from('products')
							->get();
		return $query->result();
	}

	public function p_dropdown()
	{
		$query= $this->db
							->select('product_id')
							->select('product_name')
							->from('products')
							->get();
		return $query->result_array();
	}

	public function add_product($data)
	{
		return $status = $this->db->insert('products',$data);
	}

	public function delete_product($product_id) {
		$query = $this->db->delete('products',['product_id'=>$product_id]);
		return $query;
	}

}
?>

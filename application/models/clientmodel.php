<?php

class Clientmodel extends CI_Model {

	public function client_insert($data)
	{
		return $status = $this->db->insert('clients',$data);
	}

	public function client_dropdown() {
		$query= $this->db
							->select('client_id')
							->select('cname')
							->from('clients')
							->get();
		return $query->result_array();
	}

	public function client_list()
	{
		$query= $this->db
							->select('client_id')
							->select('cname')
							->select('created_at')
							->select('email')
							->select('mobile')
							->select('remarks')
							->from('clients')
							->get();
		return $query->result();
	}

	public function find_client($client_id)
	{
		$query = $this->db
							->select(['client_id','cname','email','mobile','remarks'])
							->where('client_id',$client_id)
							->get('clients');
		return $query->row();
	}

	public function delete_client($client_id)
	{
		$query = $this->db->delete('clients',['client_id'=>$client_id]);
		return $query;
	}

	public function update_client($client_id,Array $data)
	{
		return $this->db
					->where('client_id',$client_id)
					->update('clients',$data);
	}

}

?>

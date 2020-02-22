<?php

class Dashboardmodel extends CI_Model {

	public function get_services()
	{
		$query= $this->db
							->select('*')
							->from('services')
							->order_by("op_id", "ASC")
							->get();
		return $query->result();
	}

	public function update_expiry($service_id,$days_left) {
		$data=array('days_left'=>$days_left);
		return $this->db
					->where('service_id',$service_id)
					->update('services',$data);
	}

}
?>

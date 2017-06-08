<?php

class Dashboardactivitymodel extends CI_Model {

	public function client_insert($data)
	{
		return $status = $this->db->insert('clients',$data);
	}

}

?>

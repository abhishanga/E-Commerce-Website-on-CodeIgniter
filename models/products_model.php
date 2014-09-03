<?php 

class Products_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function get_all()
	{
		$query = $this->db->get('product');
		return $query->result_array();
	}
	public function search($search)
{ $this->db->like('productname', "$search"); 
$query = $this->db->get('product');
return $query->result_array();
}
}
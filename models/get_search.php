<?php

class Get_search extends CI_Model{



public function __construct()
{
   parent::__construct();
$this->load->library('database');
}

public function search($search)
{
$query = $this->db->query("SELECT * FROM product where productname LIKE '%$search%'");
return $query->result();
}






}
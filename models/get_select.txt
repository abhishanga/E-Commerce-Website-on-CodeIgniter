<?php

class Get_db extends CI_Model{



public function __construct()
{
   parent::__construct();

}

public function getAll(){
$query = $this->db->query("SELECT * FROM product");

return $query->result();
}




}
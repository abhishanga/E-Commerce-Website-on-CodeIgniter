<?php

class Get_select extends CI_Model{



public function __construct()
{
   parent::__construct();

}

public function getAll(){
$query = $this->db->query("SELECT * FROM productcategory");

return $query->result();
}




}
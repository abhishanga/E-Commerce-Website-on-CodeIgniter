<?php

class Get_pc extends CI_Model{



public function __construct()
{
   parent::__construct();

}

public function getAll($pid){

$this->db->where('productcategoryid',$pid);
$query=$this->db->get('product');
return $query->result();
}
public function getAll1(){

$this->db->select('*');
$this->db->from('product');
$this->db->join('specialsales', 'product.productid = specialsales.productid');
$query = $this->db->get();
return $query->result();
}




}
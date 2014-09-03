<?php

class Get_main extends CI_Model{



public function __construct()
{
   parent::__construct();

}

public function getorder(){
$cid = $this->session->userdata('userid');
$query = $this->db->query("SELECT * FROM `order` WHERE customerid=$cid");

return $query->result();
}
public function getorderdetail($oid){

$query = $this->db->query("SELECT * from product p,orderdetail od WHERE p.productid=od.productid AND orderid=$oid");

return $query->result();
}

public function changeuser()
{ $cid = $this->session->userdata('userid');
$query = $this->db->query("SELECT * from customer WHERE customerid=$cid");

return $query->result(); }

public function change_customer()
{ $cid = $this->session->userdata('userid');
$data = array(
'username'=>$this->input->post('username'),
'password'=>$this->input->post('password'),
'firstname'=>$this->input->post('fname'),
'lastname'=>$this->input->post('lname'),
'email'=>$this->input->post('email'),
'phone'=>$this->input->post('phone'),
'age'=>$this->input->post('age')
);
 $this->db->where('customerid', $cid);
 $query=$this->db->update('customer', $data);
if($query)
return true;
else 
return false;
}
public function change_customer1()
{ 
$data = array(
'username'=>$this->input->post('username'),
'password'=>$this->input->post('password'),
'firstname'=>$this->input->post('fname'),
'lastname'=>$this->input->post('lname'),
'email'=>$this->input->post('email'),
'phone'=>$this->input->post('phone'),
'age'=>$this->input->post('age')
);


}
}





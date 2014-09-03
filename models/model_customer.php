<?php

class Model_customer extends CI_Model {

public function can_log_in() {
$this->db->where('username',$this->input->post('username'));
$this->db->where('password',md5($this->input->post('password')));
$query=$this->db->get('customer');
if($query->num_rows()==1){
return $query->row()->customerid;  }
else
return false;
}
public function add_customer()
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
$query=$this->db->insert('customer',$data);
if($query)
return true;
else 
return false;
}
}


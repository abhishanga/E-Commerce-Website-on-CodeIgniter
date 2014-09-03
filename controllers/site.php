<?php 

class Site extends CI_Controller{

public function index(){
$this->load->library('user_agent');

if ($this->agent->is_mobile())
{
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll1();
$this->load->view("view_loginm",$this->data);
}
else{
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll1();
$this->load->view("view_login",$this->data);

} }
public function getValues(){
$this->load->model("get_db");

$data['results'] = $this->get_db->getAll();

$this->load->view('view_products',$data); }

public function members()
{ 
if($this->session->userdata('is_logged_in')){
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll1();
if ($this->agent->is_mobile())
$this->load->view('view_memberm');
else
$this->load->view('view_member',$this->data); }
else
redirect('site/signin'); 
}

public function restricted()
{
$this->load->view('view_restricted');
}



public function login_validation()
{ $this->load->library('form_validation');
$this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials|strip_tags');
$this->form_validation->set_rules('password','Password','required|md5|trim');
if($this->form_validation->run()) {
$data= array( 
'username' =>$this->input->post('username'),
'is_logged_in'=>1);
$this->session->set_userdata($data);

if($this->session->userdata('checkout') == "1")
{ redirect('billing'); $this->session->set_userdata('checkout', 0);}
else
redirect ('site/members'); }
else {
if ($this->agent->is_mobile())
$this->load->view('view_signinm');
else
$this->load->view('view_signin');}
}

public function validate_credentials() {
$this->load->model('model_customer');
$userid=$this->model_customer->can_log_in();
if($userid){
$this->session->set_userdata('userid', $userid);
return true; }
else {
$this->form_validation->set_message('validate_credentials','Incorrect Username/Password');
return false; }
}



public function signin(){
if ($this->agent->is_mobile())
$this->load->view('view_signinm');
else
$this->load->view('view_signin');}

public function pc()
{ 
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll(100);
if ($this->agent->is_mobile())
$this->load->view('view_productcategorym',$this->data);
else
$this->load->view('view_productcategory',$this->data);
}
public function pc1()
{ $data['pid']=102;
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll($data['pid']);
if ($this->agent->is_mobile())
$this->load->view('view_productcategorym',$this->data);
else
$this->load->view('view_productcategory',$this->data);
}
public function pc2()       
{ $data['pid']=101;
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll($data['pid']);
if ($this->agent->is_mobile())
$this->load->view('view_productcategorym',$this->data);
else
$this->load->view('view_productcategory',$this->data);
}
public function pc3()
{ $data['pid']=103;
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll($data['pid']);
if ($this->agent->is_mobile())
$this->load->view('view_productcategorym',$this->data);
else
$this->load->view('view_productcategory',$this->data);
}
public function pc4()
{ 
$this->load->model("get_pc");
$this->data['products'] =$this->get_pc->getAll1();
if ($this->agent->is_mobile())
$this->load->view('view_specialsalesm',$this->data);
else
$this->load->view('view_specialsales',$this->data);
}

public function signup()
{
if ($this->agent->is_mobile())
$this->load->view('view_signupm');
else
$this->load->view('view_signup');
}
public function signup_validation()
{
$this->load->library('form_validation');
$this->form_validation->set_rules('username','Username','required|trim|is_unique[customer.username]|xss_clean||htmlspecialchars||alpha_dash|strip_tags');
$this->form_validation->set_rules('password','Password','required|trim|md5||htmlspecialchars|strip_tags');
$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]|md5||htmlspecialchars|strip_tags');
$this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]||htmlspecialchars|strip_tags');
$this->form_validation->set_rules('age', 'Age', 'required|regex_match[/^[0-9]{1,2}$/]||htmlspecialchars|strip_tags');
$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
$this->form_validation->set_rules('fname', 'First Name', 'required|trim||htmlspecialchars||alpha_dash|strip_tags');
$this->form_validation->set_rules('lname', 'Last Name', 'required|trim||htmlspecialchars||alpha_dash|strip_tags');
if($this->form_validation->run())
{ $this->load->model("model_customer");
$this->model_customer->add_customer(); 
if ($this->agent->is_mobile())
$this->load->view('success2');
else
$this->load->view('success1');}
else
{ echo "Unsucessful Registration"; 
if ($this->agent->is_mobile())
$this->load->view('view_signupm');
else
$this->load->view('view_signup');
 }

}

public function logout()
{
$this->session->sess_destroy();
redirect('site/signin');
}








public function __construct()
{
   parent::__construct();
$this->load->library('user_agent');
   $this->load->model('get_db',TRUE);
   $this->load->model('get_pc',TRUE);
}




}
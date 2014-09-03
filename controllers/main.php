<?php 

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('get_main');
		$this->load->library('user_agent');
	}
    public function vieworder()
	{
	$this->load->model("get_main");
	$data['results']=$this->get_main->getorder();
	if ($this->agent->is_mobile())
    $this->load->view('view_orderm',$data);
    else
	$this->load->view('view_order',$data);
	
	}
	public function changeuser()
	{
		$this->load->model("get_main");
	$data['results']=$this->get_main->changeuser();
	if ($this->agent->is_mobile())
    $this->load->view('view_changem',$data);
    else
	$this->load->view('view_change',$data);
	}
	 public function vieworderdetail($oid)
	{ $data['oid']=$oid;
	$this->load->model("get_main");
	$data['results']=$this->get_main->getorderdetail($data['oid']);
	if ($this->agent->is_mobile())
    $this->load->view('view_orderdetailm',$data);
    else
	$this->load->view('view_orderdetail',$data);
	
	}
public function change_validation()
{
$this->load->library('form_validation');
$this->form_validation->set_rules('password','Password','trim|md5');
$this->form_validation->set_rules('cpassword','Confirm Password','trim|matches[password]|md5');
$this->form_validation->set_rules('phone', 'Phone', 'regex_match[/^[0-9]{10}$/]');
$this->form_validation->set_rules('age', 'Age', 'regex_match[/^[0-9]{1,2}$/]');
$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email');
$this->form_validation->set_rules('fname', 'First Name', 'trim');
$this->form_validation->set_rules('lname', 'Last Name', 'trim');
if($this->form_validation->run())
{ $this->load->model("get_main");
if($this->get_main->change_customer())
echo "Pass";
else
echo "Fail"; }
else{ 
$this->load->model("get_main");
$data['results']=$this->get_main->change_customer1();
if ($this->agent->is_mobile())
 $this->load->view('view_change1m',$data);
 else
$this->load->view('view_change1',$data); 
}
}
}





	
<?php 

class Billing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Billing_model');
		$this->load->library('user_agent');
	}

	public function index()
	{	if($this->session->userdata('is_logged_in')){
		$this->data['title'] = 'Billing';                               
		if ($this->agent->is_mobile())
         $this->load->view('billingm', $this->data);
		 else
		$this->load->view('billing', $this->data);
	} else{
	if ($this->agent->is_mobile())
    $this->load->view('view_signinm');
    else
	$this->load->view('view_signin');
$this->session->set_userdata('checkout', 1);	} }
	
	public function save_order()
	{ $this->load->library('form_validation');
$this->form_validation->set_rules('fname','First Name','required|trim|xss_clean|htmlspecialchars|alpha_dash|strip_tags');
$this->form_validation->set_rules('lname','Last Name','required|trim|xss_clean|htmlspecialchars|alpha_dash|strip_tags');
$this->form_validation->set_rules('baddress','Billing Address','required|trim|xss_clean|htmlspecialchars|strip_tags');
$this->form_validation->set_rules('saddress','Shipping Address','required|trim|xss_clean|htmlspecialchars|strip_tags');

$this->form_validation->set_rules('cc', 'Credit Card', 'required|regex_match[/^[0-9]{16}$/]|htmlspecialchars|strip_tags');
$this->form_validation->set_rules('cvv', 'CVV', 'required|regex_match[/^[0-9]{3}$/]|htmlspecialchars|strip_tags');

if($this->form_validation->run()){
		
		$cust_id = $this->session->userdata('userid');

		$order = array(
			'date' 			=> date('Y-m-d'),
			'customerid' 	=> $cust_id,
			'shippingaddress' 	=> $this->input->post('saddress'),
			'billingaddress' 	=> $this->input->post('baddress'),
			'totalcost'=>$this->input->post('total')
		);		

		$ord_id = $this->Billing_model->insert_order($order);
		
		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $ord_id,
					'productid' 	=> $item['id'],
					'productquantity' 		=> $item['qty'],
					'productprice' 		=> $item['price']
				);		

				$cust_id = $this->Billing_model->insert_order_detail($order_detail);
			endforeach;
		endif;
		if ($this->agent->is_mobile())
    $this->load->view('thank1');

		else { $this->load->view('thank2');
	
	} }else
	{
	if ($this->agent->is_mobile())
    $this->load->view('billingm');
    else
$this->load->view('billing');	}
} }
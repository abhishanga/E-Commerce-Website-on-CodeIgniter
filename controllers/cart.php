<?php 

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Cart_model');
		$this->load->library('user_agent');
	}

	public function index()
	{	
		$this->data['title'] = 'Shopping Cart';

		if (!$this->cart->contents()){
			$this->data['message'] = '<p>Your cart is empty!</p>';
		}else{
			$this->data['message'] = $this->session->flashdata('message');
		}
		if ($this->agent->is_mobile())
         $this->load->view('cartm', $this->data);
         else
		$this->load->view('cart', $this->data);
	}

	public function add()
	{
		$this->load->model('Cart_model');
	
		$insert_room = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);		
        
		$this->cart->insert($insert_room);
			
		redirect('cart');
	}
	
	function remove($rowid) {
		if ($rowid=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}
		
		redirect('cart');
	}	

	function update_cart(){
 		foreach($_POST['cart'] as $id => $cart)
		{			
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			
			$this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
		}
		
		redirect('cart');
	}	
}
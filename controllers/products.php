<?php 

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Products_model');
		$this->load->library('user_agent');
	}

	public function index()
	{	
		$this->data['title'] = 'Products';

		$this->data['products'] = $this->Products_model->get_all();
		if ($this->agent->is_mobile())
         $this->load->view('productsm', $this->data);
		 else
		$this->load->view('products', $this->data);
	}
	public function search(){
	$search = $this->input->post('search');

	$this->load->library('form_validation');


$this->form_validation->set_rules('search','Search','required|trim|xss_clean|htmlspecialchars|strip_tags');

if($this->form_validation->run()){
$this->data['products'] = $this->Products_model->search($search);
if ($this->agent->is_mobile())
         $this->load->view('searchm', $this->data);
		 else

$this->load->view('search', $this->data);}
else
$this->load->view('fail1');

}
}
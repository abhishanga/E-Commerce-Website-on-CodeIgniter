<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
  <link href='http://cs-server.usc.edu:2345/CodeIgniter/application/css/mobile.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

    <style>
      article {
        width: 350px;
      }
	   
</style>
    <title>SoCal Clothing Line</title>
  </head>
  <body>

  <div data-role="page">
  <div data-role="panel" id="myPanel"> 
    <p>Departments</p>
   <div data-role="controlgroup" data-type="vertical">
	
        <li><a href="<?php echo base_url().'site/pc'?>" class="ui-btn">T-Shirts</a></li>
        <li><a href="<?php echo base_url().'site/pc2'?>" class="ui-btn">Dresses</a></li>
        <li><a href="<?php echo base_url().'site/pc1'?>" class="ui-btn">Bottoms</a></li>
        <li><a href="<?php echo base_url().'site/pc3'?>" class="ui-btn">Sweatshirts</a></li>
		<li><a href="<?php echo base_url().'site/pc4'?>" class="ui-btn">Special Sales</a></li>
      </div></div>

  <div data-role="header">
<div id="headline">
<h2>SoCal Clothing Line</h2> </div>
<div data-role="navbar">
<ul>
<a href="<?php echo base_url().'site'; ?>" class="ui-btn ui-icon-home ui-btn-icon-notext"></a>
<a href="<?php echo base_url().'cart'; ?>" class="ui-btn ui-corner-all ui-icon-shop ui-btn-icon-notext"></a>
<a href="<?php echo base_url().'site/members'; ?>" class="ui-btn ui-corner-all ui-icon-user ui-btn-icon-notext"></a>

</div>
</ul>
</div>
 <div data-role="main" class="ui-content">
        <a href="#myPanel" class="ui-btn ui-icon-grid ui-btn-icon-left">Departments</a> 

		<?php 
	echo form_open('site/signup_validation');
	echo validation_errors(); ?>
Username:<span style="color:red"> *</span>  <?php form_label('username','username');$attributes = array('id' => 'username');echo form_input('username',$this->input->post('username'),$attributes); ?>
Password:<span style="color:red"> *</span>  <?php form_label('password','password');$attributes = array('id' => 'password');echo form_password('password',$attributes); ?>
Confirm Password:<span style="color:red"> *</span>  <?php form_label('cpassword','cpassword');$attributes = array('id' => 'cpassword');echo form_password('cpassword',$attributes); ?>
First Name:<span style="color:red"> *</span>  <?php form_label('fname','fname');$attributes = array('id' => 'fname');echo form_input('fname',$this->input->post('fname'),$attributes); ?>
Last Name:<span style="color:red"> *</span>  <?php form_label('lname','lname');$attributes = array('id' => 'lname');echo form_input('lname',$this->input->post('lname'),$attributes); ?>
Age:<span style="color:red"> *</span>  <?php form_label('age','age');$attributes = array('id' => 'age');echo form_input('age',$this->input->post('age'),$attributes); ?>
Phone:<span style="color:red"> *</span>  <?php form_label('phone','phone');$attributes = array('id' => 'phone');echo form_input('phone',$this->input->post('phone'),$attributes); ?>
E-mail:<span style="color:red"> *</span> <?php form_label('email','email');$attributes = array('id' => 'email');echo form_input('email',$this->input->post('email'),$attributes); ?>
<?php echo form_submit('signup_submit','Sign up'); ?>
<?php echo form_close(); ?>
</div>
<div data-role="footer">
		 <form name='proform' action='http://cs-server.usc.edu:2345/CodeIgniter/index.php/products/search' method='POST' >
  <p>Search</p>
    <?php echo form_input('search',$this->input->post('search')); ?> 
     <?php echo form_submit('Go','Go'); ?> <br>

   </form>
 
  </div>				
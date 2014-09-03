<!DOCTYPE html>
<html>
<head>



		<title> SoCal Clothing Line</title><link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2345/CodeIgniter/application/css/global.css">
		</head>                                                                                  
		<body>
		
	  <h1></h1>
      <h2>SoCal Clothing Line</h2>
	  <div class="menuDiv">
			<div name="menuForm">
   <form name='proform' action='http://cs-server.usc.edu:2345/CodeIgniter/index.php/products/search' method='POST' >
 <b>Search</b>
    <?php echo form_input('search',$this->input->post('search')); ?> 
     <?php echo form_submit('Go','Go'); ?> <br>

   </form>	
	<span style = "position:absolute;right:140px;top:-45px">
				<a  href="<?php echo base_url().'site/logout'; ?>"><img src="http://cs-server.usc.edu:2345/CodeIgniter/images/logout.png" alt="Logout" height="40px" width="80px"></a></span>
				<span style = "position:absolute;right:230px;top:-45px">
				<a  href="<?php echo base_url().'site'; ?>"><img src="http://cs-server.usc.edu:2345/CodeIgniter/images/home.png" alt="Home" height="40px" width="40px"></a></span>
   
	<span style = "position:absolute;right:150px;top:10px">
				<a  href="<?php echo base_url().'cart'; ?>"><img src="http://cs-server.usc.edu:2345/CodeIgniter/images/cart1.png" alt="Shopping Cart" ></a></span>
		
				<span style = "position:relative;left:290px;top:-23px">
				<a class="menuA" href="<?php echo base_url().'site/signin'; ?>">Login</a></span></div></div>
	         <table width="100%" height="100%"  border="0">
			  <tr valign="top">
    <td style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg4.jpg');height:500px;
                  width:200px;text-align:top;position:relative;top:108px;border: 5px outset #009ACD;">
			<p>Departments:</p>
<li><a href=<?php echo base_url().'site/pc'?>>T-Shirts</a></li><li><a href=<?php echo base_url().'site/pc1'?>>Bottoms</a></li><li><a href=<?php echo base_url().'site/pc2'?>>Dresses</a></li><li><a href=<?php echo base_url().'site/pc3'?>>Sweatshirts</a></li>			<li><a style="color:#E00000" href=<?php echo 'site/pc4'?>>Special Sales</a></li> </td>
	<td><div style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg3.jpg');height:2000px;" id="txtdisplay" >
		<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
	<tr>
			<td>	Registration Success<br />

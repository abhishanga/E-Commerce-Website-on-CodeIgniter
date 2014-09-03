<?php
$grand_total = 0;

if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
		$grand_total = $grand_total + $item['subtotal'];
	endforeach;
endif;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing Info</title>
<link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2345/CodeIgniter/application/css/global.css">
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
			<p><b>Departments:</b></p>
	<li><a href=<?php echo base_url().'site/pc'?>>T-Shirts</a></li><li><a href=<?php echo base_url().'site/pc1'?>>Bottoms</a></li><li><a href=<?php echo base_url().'site/pc2'?>>Dresses</a></li><li><a href=<?php echo base_url().'site/pc3'?>>Sweatshirts</a></li>
	<li><a style="color:#E00000" href="<?php echo base_url().'site/pc4'?>"><b>Special Sales</b></a></li> </td>
	<td><div style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg3.jpg');height:1000px;" id="txtdisplay" >
		<table border="0" align="center" cellpadding="20" cellspacing="20" width="80%">
	<tr>
<form name="billing" method="post" id="billing" action=<?php echo base_url()."billing/save_order"; ?>>
    <input type="hidden" name="command" />
	<div align="center">
	
        <p align="center"><big style="color:blue">Billing Info</big></p>
       	
		<table border="0" cellpadding="2px">	
        Order Total:<strong>$<?php echo number_format($grand_total,2); ?></strong>
			<input type="hidden" name="total" value="<?php echo number_format($grand_total,2); ?>" />
			
	<span id="formerror" class="error"></span>
		<?php echo validation_errors(); ?>
				<tr><td><p>
				<label for="cname">First Name (required, at least 2 characters)</label></td><td>
				<input id="cname" name="fname" minlength="2" type="text" title="Please enter your first name" value="<?php echo set_value('fname'); ?>"  autofocus required placeholder="First" >
			</p></td></tr>
					<tr><td><p>
				<label for="lname">Last Name (required, at least 2 characters)</label></td><td>
				<input id="lname" name="lname" minlength="2" type="text" title="Please enter your last name"  value="<?php echo set_value('lname'); ?>"autofocus required placeholder="Last" >
			</p></td></tr>
					<tr><td><p>
				<label for="baddress">Billing Address</label></td><td>
				<input id="baddress" name="baddress" minlength="2" type="text" title="Please Billing Address"  value="<?php echo set_value('baddress'); ?>" autofocus required placeholder="Billing Address" >
			</p></td></tr>
					<tr><td><p>
				<label for="saddress">Shipping Address</label></td><td>
				<input id="saddress" name="saddress" minlength="2" type="text" title="Please Shipping Address"  value="<?php echo set_value('saddress'); ?>"autofocus required placeholder="Shipping Address" >
			</p></td></tr>
					<tr><td><p>
				<label for="cc">Credit Card</label></td><td>
				<input id="cc" name="cc" minlength="16" maxlength="16" type="number" required placeholder="Credit Card" value="<?php echo set_value('cc'); ?>"title="Please 16 digit number">
			</p></td></tr>
				<tr><td><p>
				<label for="cvv">Credit Card</label></td><td>
				<input id="cvv" name="cvv" minlength="3" maxlength="3" type="number" required placeholder="CVV" value="<?php echo set_value('cvv'); ?>" title="Please CVV">
			</p></td></tr>
				<tr><td><p>
			  &nbsp;</td><td><input type="submit" value="Place Order" />
			</p></td></tr>

	</form>
	</table>
	<script>
$(document).ready(function() {
	$('#myform').submit(function() {
		var abort = false;
		$("div.error").remove();
		$(':input[required]').each(function() {
			if ($(this).val()==='') {
				$(this).after('<div class="error">This is a required field</div>');
				abort = true;
			}
		}); // go through each required value
		if (abort) { return false; } else { return true; }
	})//on submit
}); // ready
</script>
         
         
        </table>
	</div>

</body>
</html>
<?php
$grand_total = 0;

if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
		$grand_total = $grand_total + $item['subtotal'];
	endforeach;
endif;
?>


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
		<form name="billing" method="post" id="billing" action=<?php echo base_url()."billing/save_order"; ?>>
    <input type="hidden" name="command" />
	<div align="center">
	
        <p align="center"><big style="color:blue">Billing Info</big></p>
       	

        Order Total:<strong>$<?php echo number_format($grand_total,2); ?></strong>
			<input type="hidden" name="total" value="<?php echo number_format($grand_total,2); ?>" />
			
	<span id="formerror" class="error"></span>
		<?php echo validation_errors(); ?>
			
				<label for="cname">First Name (required, at least 2 characters)</label>
				<input id="cname" name="fname" minlength="2" type="text" title="Please enter your first name" value="<?php echo set_value('fname'); ?>"  autofocus required placeholder="First" >
		
				<label for="lname">Last Name (required, at least 2 characters)</label>
				<input id="lname" name="lname" minlength="2" type="text" title="Please enter your last name"  value="<?php echo set_value('lname'); ?>"autofocus required placeholder="Last" >
			
				<label for="baddress">Billing Address</label>
				<input id="baddress" name="baddress" minlength="2" type="text" title="Please Billing Address"  value="<?php echo set_value('baddress'); ?>" autofocus required placeholder="Billing Address" >
		
				<label for="saddress">Shipping Address</label>
				<input id="saddress" name="saddress" minlength="2" type="text" title="Please Shipping Address"  value="<?php echo set_value('saddress'); ?>"autofocus required placeholder="Shipping Address" >
		
				<label for="cc">Credit Card</label>
				<input id="cc" name="cc" minlength="16" maxlength="16" type="number" required placeholder="Credit Card" value="<?php echo set_value('cc'); ?>"title="Please 16 digit number">
		
			
				<label for="cvv">Credit Card</label>
				<input id="cvv" name="cvv" minlength="3" maxlength="3" type="number" required placeholder="CVV" value="<?php echo set_value('cvv'); ?>" title="Please CVV">
		
			  &nbsp;<input type="submit" value="Place Order" />
			

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
</script></div>
   <div data-role="footer">
		 <form name='proform' action='http://cs-server.usc.edu:2345/CodeIgniter/index.php/products/search' method='POST' >
  <p>Search</p>
    <?php echo form_input('search',$this->input->post('search')); ?> 
     <?php echo form_submit('Go','Go'); ?> <br>

   </form>
 
  </div>		      
         
    
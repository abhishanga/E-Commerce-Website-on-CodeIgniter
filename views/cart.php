<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script>
function clear_cart() {
	var result = confirm('Are you sure want to clear all bookings?');
	
	if(result) {
		window.location = "<?php echo base_url(); ?>cart/remove/all";
	}else{
		return false; // cancel button
	}
}
</script>
<link rel="stylesheet" type="text/css" href="http://cs-server.usc.edu:2345/CodeIgniter/application/css/global.css">
</head>
<body>
	  <h1></h1>
      <h2>SoCal Clothing Line</h2>
	  <div class="menuDiv">
			<form name="menuForm">
   
  
		
				<b>Search: </b>
				<select name="productCategorySelect">
<option value="-1" selected="selected">All Product Categories</option>
</select>
<input type="text" style="width:300pt" name="productKeyWords"/>
				<input type="button" value="Go" onclick="goProducts()"/>
				<span style = "position:absolute;right:140px;top:-45px">
				<a  href="<?php echo base_url().'site/logout'; ?>"><img src="http://cs-server.usc.edu:2345/CodeIgniter/images/logout.png" alt="Logout" height="40px" width="80px"></a></span>
				<span style = "position:absolute;right:230px;top:-45px">
				<a  href="<?php echo base_url().'site'; ?>"><img src="http://cs-server.usc.edu:2345/CodeIgniter/images/home.png" alt="Home" height="40px" width="40px"></a></span>


				

<span style = "position:absolute;right:150px">
				<a  href="<?php echo base_url().'cart'; ?>"><img src="http://cs-server.usc.edu:2345/CodeIgniter/images/cart1.png" alt="Shopping Cart" ></a></span>
				


		
				<span style = "position:relative;left:20px">
				<a class="menuA" href="<?php echo base_url().'site/signin';?>">Login</a></span></div></form>
	         <table width="100%" height="100%"  border="0">
			  <tr valign="top">
    <td style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg4.jpg');height:500px;
                  width:200px;text-align:top;position:relative;top:108px;border: 5px outset #009ACD;">
			<p>Departments:</p>
<li><a href=<?php echo base_url().'site/pc'?>>T-Shirts</a></li><li><a href=<?php echo base_url().'site/pc1'?>>Bottoms</a></li><li><a href=<?php echo base_url().'site/pc2'?>>Dresses</a></li><li><a href=<?php echo base_url().'site/pc3'?>>Sweatshirts</a></li>			<li><a style="color:#E00000" href=<?php echo base_url().'site/pc4'?>>Special Sales</a></li> </td>
	<td><div style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg3.jpg');height:1000px;" id="txtdisplay" >
		<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
	<tr>
<div style="margin:0px auto; width:600px;" >
	<div style="padding-bottom:10px">
		<p><big style="color:black">Your Shopping Cart</p></big>
		<input type="button" value="Continue Shopping" id="ss"  style="position:relative;right:270px" />
		<script>
$( "#ss" ).click(function() {
window.location='products';
});
</script>
	</div>
	<div style="color:#F00"><?php echo $message?></div>
	<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="600" >
		<?php if ($cart = $this->cart->contents()): ?>
		<tr bgcolor="#FFFFFF" style="font-weight:bold">
			<td>Serial</td>
			<td>Name</td>
			<td>Price</td>
			<td>Qty</td>
			<td>Amount</td>
			<td>Options</td>
		</tr>
		<?php
		echo form_open('cart/update_cart');
		$grand_total = 0; $i = 1;
		
		foreach ($cart as $item):
			echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
			echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
			echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
			echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
			echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
		?>
		<tr bgcolor="#FFFFFF">
			<td>
				<?php echo $i++; ?>
			</td>
			<td>
				<?php echo $item['name']; ?>
			</td>
			<td>
				$ <?php echo number_format($item['price'],2); ?>
			</td>
			<td>
				<?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
			</td>
			<?php $grand_total = $grand_total + $item['subtotal']; ?>
			<td>
				$ <?php echo number_format($item['subtotal'],2) ?>
			</td>
			<td>
				<?php echo anchor('cart/remove/'.$item['rowid'],'Cancel'); ?>
			</td>
			<?php endforeach; ?>
		</tr>
		<tr>
			<td><b>Order Total: $<?php echo number_format($grand_total,2); ?></b></td>
			<td colspan="5" align="right"><input type="button" value="Clear Cart" id="cc" >
			<script>
$( "#cc" ).click(function() {
 clear_cart();
});
</script>
					<input type="submit" value="Update Cart">
					<?php echo form_close(); ?>
					<input type="button" value="Place Order" id="bb" ></td>
<script>
$( "#bb" ).click(function() {
window.location='billing';
});
</script>
		</tr>
		<?php endif; ?>
	</table>
</div>
</body>
</html>
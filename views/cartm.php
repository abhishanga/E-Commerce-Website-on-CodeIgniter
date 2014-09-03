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
<style>
      article {
        width: 350px;
      }
	   th
{
border-bottom: 1px solid #d6d6d6;
}
tr:nth-child(even)
{
background:#e9e9e9;
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
		<input type="button" value="Continue Shopping" id="ss"  style="position:relative;right:270px" class="ui-btn"  />
		<script>
$( "#ss" ).click(function() {
window.location='products';
});
</script>
	
	<div style="color:#F00"><?php echo $message?></div>
	
	<table data-role="table" class="ui-responsive" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100" >
		<?php if ($cart = $this->cart->contents()): ?>
		<thead>
    
		<tr bgcolor="#FFFFFF" style="font-weight:bold">
			<td>Serial</td>
			<td>Name</td>
			<td>Price</td>
			<td>Qty</td>
			<td>Amount</td>
			<td>Options</td>
		</tr></thead>
		<?php
	    
		echo form_open('cart/update_cart');
		$grand_total = 0; $i = 1;
		
		
		foreach ($cart as $item):
			echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
			echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
			echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
			echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
			echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);
		?><tbody>
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
				<?php echo form_input('cart['. $item['id'] .'][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"');  ?>
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
		<tr></tbody></table>
			<td><b>Order Total: $<?php echo number_format($grand_total,2); ?></b></td>
			<td colspan="5" align="right"><input type="button" value="Clear Cart" id="cc" class="ui-btn" onclick="clear_cart()" >

					<input type="submit" value="Update Cart" class="ui-btn" >
					<?php echo form_close(); ?>
					<input type="button" value="Place Order" id="bb" class="ui-btn" onclick="location.href = 'billing';"></td>

		</tr>
		<?php endif; ?></div>
		<div data-role="footer">
		 <form name='proform' action='http://cs-server.usc.edu:2345/CodeIgniter/index.php/products/search' method='POST' >
  <p>Search</p>
    <?php echo form_input('search',$this->input->post('search')); ?> 
     <?php echo form_submit('Go','Go'); ?> <br>

   </form>
 
  </div>				
              
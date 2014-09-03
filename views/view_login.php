<!DOCTYPE html>
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
$(document).ready(function(){
  $("#b").click(function(){
    $("#div1").load("http://cs-server.usc.edu:2345/CodeIgniter/images/demo_test.txt");
  });
});

</script>
<style> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#F0F8FF;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
</style>
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
				<a class="menuA" href="<?php echo base_url().'site/signin'; ?>">Login/Signup</a></span></div></div>
	         <table width="100%" height="100%"  border="0">
			  <tr valign="top">
    <td style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg4.jpg');height:500px;
                  width:200px;text-align:top;position:relative;top:108px;border: 5px outset #009ACD;">
			<p>Departments:</p>
<li><a href=<?php echo base_url().'site/pc'?>>T-Shirts</a></li><li><a href=<?php echo base_url().'site/pc1';?>>Bottoms</a></li><li><a href=<?php echo base_url().'site/pc2'; ?>>Dresses</a></li><li><a href=<?php echo base_url().'site/pc3';?>>Sweatshirts</a></li>			<li><a style="color:#E00000" href=<?php echo base_url().'site/pc4';?>>Special Sales</a></li> </td>

	<td><div style="background-image:url('http://cs-server.usc.edu:2345/CodeIgniter/images/bg3.jpg');height:1000px;" id="txtdisplay" >
		<table border="0" align="center" cellpadding="0" cellspacing="0" width="600">
	<tr>
					<td style="position:relative;left:600px">
		<div id="flip">About SoCal</div>
<div id="panel">The concept was originally designed to attract consumers aged 14–18, at a lower price through its SoCal-inspired image and casual wear.Goods are available in-store and through the company's online store.It was ranked as the second most preferred clothing brand of US teens on a long list of actual West Coast companies.</div></td>
					<td><input type="image" src="http://cs-server.usc.edu:2345/CodeIgniter/images/sale.gif" height="50" width="100" style="position:relative;right:150px"/><br>
						<td style="position:relative;top:300px;left:250px"><div id="div1"><p>Peek into our Secret Sales</p></div>
<img src="http://cs-server.usc.edu:2345/CodeIgniter/images/secret.jpg"  height="70px" alt="Secret Sales" id="b"></td>
			<td>
					
				

		<?php
			foreach ($products as $product){
				$id = $product->productid;
				$name = $product->productname;
				
				$price = $product->discount;
		?>
    	<tr>
        	<td><img src="<?php echo $product->productimage?>" width="100" height="100" style="border:#777 1px solid" /></td>
            <td><b><?php echo $name; ?></b><br />
            		
                    Sales Price:<big style="color:green">
                    $<?php echo $price; ?></big><br /><br />
				Product Price:<span style="color:red;text-decoration:line-through;">
                    	$<?php echo $product->productprice?></span><br /><br />
						
                    <?php
					echo form_open('cart/add');
					echo form_hidden('id', $id);
					echo form_hidden('name', $name);
					echo form_hidden('price', $price);
					echo form_submit('action', 'Add to Cart');
					echo form_close();
					?>
			</td>
		</tr>
        <tr><td colspan="2"><hr size="1" /></td>
        <?php } ?></td>
	
		

						


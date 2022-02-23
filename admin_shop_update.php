<?php 

session_start();

	if (!isset($_SESSION["emailadmin"])) {
			header("location: index.php");
			exit();	
		}

	if (isset($_SESSION["email"])) {
			header("location: user_index.php");
			exit();	
		}



   	if (isset($_GET['logout'])) {

    	$db = new mysqli('localhost', 'root', '', 'healthyburst');
    	$event = mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES ('".$_SESSION['admin']." ".$_SESSION['emailadmin']."','Sign-Out',current_timestamp())");


    	if (isset($_SESSION['emailadmin'])) {
    	session_destroy();
	  	unset($_SESSION['emailadmin']);
	  	header("location: index.php");
	  	exit();
    	}
    	
    	}
   



 ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Healthy Burst | Edit Product</title>
	<link rel="icon" type="image/x-icon" href="images\icons\icon.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,200;1,400;1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<style>
	
	*{
		vertical-align: baseline;
		box-sizing: border-box;
		margin: 0px;
		padding: 0px;

	}

	body{

		font-family: 'Poppins', sans-serif;
		font-size: 100%;

	}

	.main-container{

		max-width: 1300px;
		margin:auto;
		padding: auto;
		height: auto;

	}

	header{

		width: 100%;
		height: auto;
		background: #E4E4E4;


	}

	.container-nav-area{

		width: 90%;
		display: flex;
		align-items: center;
	}

	.header-logo{
		flex: 1;
		text-align: center;
	}

	nav{
		flex: 2;
		text-align: center;

	}

	nav .nav-link{
		display: flex;
		justify-content: space-around;
		list-style: none;
		margin: 0;
	}

	nav .nav-link li::after{
		content: '';
		width: 0;
		height: 2px;
		background: #307564;
		display: block;
		margin: auto;
		transition: 0.5s;
	}
	nav .nav-link li:hover::after{
		width: 100%;
	}

	nav .nav-link .nav-links{
		text-decoration: none;
		color: #232323;
		font-size: 20px;
		font-variant: small-caps;
		display: block;
		
	}

	.dropdown {
	  overflow: hidden;
	  font-variant: small-caps;
	}


	.dropdown .dropbtn {
	  border: none;
	  outline: none;
	  color: white;
	  padding: 12px 14px;
	  background-color: inherit;
	}

	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #f9f9f9;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);

	}


	.dropdown-content a {
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	  text-align: left;
	}

	.dropdown-content a:hover {
	  background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
	  display: block;
}
	
	



main{
	max-width: 100%;
	margin-left: auto;
	margin-right: auto;
	
	
}

.prodtable {
	width: 50%;
	margin-left: auto;
	margin-right: auto;
	height: auto;
	
}

.prodtable table{
	
	margin: auto;
	width: 70%;
	background: #EEEEEE;
	border-radius: 10px;
	padding: 5px;
}
.prodtable table td{
	width: 50%;
	text-align: center;
	margin: 15px 0px 15px 0px;
	padding: 10px 0px 10px 0px;
}

.prodtable table td span label{
	
	font-size: inherit;
	padding: 5px 0px 5px 0px;
	
}

.prodtable table input[type=text], .prodtable table input[type=file]{
	width: 100%;
	height: auto;
	padding: 5px;
	margin: 10px 0px 10px 0px;
	text-align: center;
	border-radius: 3px;
	font-size: 15px;
}

.prodtable table input[type=submit]{
	width: 40%;
	height: auto;
	padding: 10px;
	border-radius: 5px;
	color: white;
	background: black;
	font-size: inherit;

}



footer{

	max-width: 100%;
	align-items: center;
	background: #131313;

}

.row-1{
	display: flex;
	width: 80%;
	margin-left:auto;
	margin-right: auto;
}
.row-1 .col-1{
	flex: 1;
	margin-top: 20px;
	
	
}
.row-1 .col-1 ul{
	list-style: none;
	margin: 10px 0px 10px 0px;
}
.row-1 .col-1 ul li{
	margin-top: 5px;
	text-align: center;
}
.row-1 .col-1 ul li a, .info{
	text-decoration: none;
	color: #FFFFFF;
	font-size: 12px;
}

#nav-icon{
	height: 20px;
	margin-right: 5px;
	vertical-align: text-bottom;

}
.info-header{
	text-align: center;
	width: 100%;
	margin-right: auto; 
	margin-left: auto; 
	background: #3C3C3C; 
	padding: 5px 0px 5px 0px; 
}

 

	


	@media only screen and (max-width: 500px) {

	.main-container{

		width: 100%;
		margin:auto;
		padding: auto;
		height: auto;

	}

	header{

		width:100%;
		height: auto;
		padding: 10px;

	}
	.container-nav-area{

		width: 90%;
		display: block;
		align-items: center;
		margin: auto;
		padding: auto;

	}

	.header-logo{
		
		margin-top: 10px;
		text-align: center;
	}

	nav{
		margin-top: 10px;
		text-align: center;
	}

	nav .nav-link li::after{
		content: '';
		width: 0;
		height: 2px;
		background: #307564;
		display: block;
		margin: auto;
		transition: 0.5s;
	}
	nav .nav-link li:hover::after{
		width: 100%;
	}

	nav .nav-link .nav-links{
	font-size: 12px;
	
	}


	main{
		width: 100%;
	}

.prodtable {
	width: 90%;
	margin: auto;
	height: auto;
	
}

.prodtable table{
	
	margin: auto;
	width: 100%;
	background: #EEEEEE;
	border-radius: 10px;
}
.prodtable table td{
	width: 100%;
	text-align: center;
	font-size: 12px;
}

.prodtable table td span label{
	
	font-size: inherit;
	padding: 5px 0px 5px 0px;
	
}

.prodtable table input[type=text], .prodtable table input[type=file]{
	width: 100%;
	height: auto;
	text-align: center;
	border-radius: 2px;
}

.prodtable table input[type=submit]{
	width: 35%;
	height: auto;
	

}



	

	footer{
	padding: 10px;
	width: 100%;
	align-items: center;
	background: #131313;
	font-size: 12px;

}

.row-1{
	display: block;
}
.row-1 .col-1{
	flex: 1;
	margin-top: 20px;
	
	
}
#nav-icon{
	margin-right: 5px;

}



}



	
</style>

</head>
<body>

	<div class="main-container">

	<header>

		

		<div class="container-nav-area">

			<div class="header-logo">

				<a href="index.php">
					
					<img src="images\icons\logo.png" width="190">

				</a>
				
			</div>

				<nav>

					<ul class="nav-link">
						<li><a class="nav-links" href="admin_index.php">Home</a></li>
						<li><a class="nav-links" href="admin_shop.php">Products</a></li>
						<li><a class="nav-links" href="admin_orderdetails.php">Order</a></li>
						<li><a class="nav-links" href="admin_shipmentdetails.php">Shipment</a></li>
						<li><a class="nav-links" href="admin_checkuser.php">Customer</a></li>
						<li><div class="dropdown"> <?php echo $_SESSION["lastname"]; ?>
								<span>  <i class="fa fa-caret-down"></i></span>
							   
							 
							    <div class="dropdown-content">
							      <a href="admin_profile.php">Profile</a>
							      <a href="admin_index.php?logout='1'">Sign-Out</a>
							    </div>
						</li>
					</ul>
				</nav>
			

		</div>
		
	</header>

	<hr style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 20px;margin-bottom: 20px;">
	

	<main>

		<br><br>

		<section class="prodtable">



	
 <?php
if(isset($_GET['id']))
{
  $id = trim($_GET['id']) - 0;

  include 'connect.php';
 

  $product = [];
  $sql = "SELECT * FROM product WHERE prod_id = $id";
  $result = $db->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    	
      $product['product_name'] = $row['prod_name'];
      $product['product_price'] = $row['prod_price'];
      $product['product_size'] = $row['prod_size'];
      $product['product_quantity'] = $row['prod_quantity'];
      $product['product_desc'] = $row['prod_description'];
      $product['product_image'] = $row['prod_image'];
      $id = $product['product_name'];
    }
  }
  $db->close();
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  

  if(isset($_POST["update"]))
  {
  	
      	$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_size = $_POST['product_size'];
		$product_desc = $_POST['product_desc'];
		$product_quantity = $_POST['product_quantity'];

		//getting the image from the field
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp, "upload_image/$product_image");


      include 'connect.php';
  
      $sql = "UPDATE `product` SET 
       prod_image ='$product_image',
       prod_price ='$product_price',
       prod_size ='$product_size ',
       prod_quantity ='$product_quantity',
       prod_description ='$product_desc' WHERE prod_name = '$product_name'";

      if($db->query($sql)===TRUE)
      {
        echo "<script>alert('Product has been Updated!')</script>";
        echo "<script> window.location.replace('http://localhost/healthyburst_site/admin_shop_list.php');</script>";
      } 
      else
      {
        echo "Error: " . $sql . "<br>" . $db->error;
      }
      $db->close();
  }

  if (isset($_POST["delete"])) {
		  	$item =  $_POST['product_name'];
		  	$sql = "DELETE FROM product WHERE prod_name ='$item'";
		  	
		  	include 'connect.php';
		  	$result_del = mysqli_query($db, $sql);

		  	if($result_del) {
		  		echo "<script>alert('Product has been Deleted!')</script>";
		  		echo "<script> window.location.replace('http://localhost/healthyburst_site/admin_shop_list.php');</script>";
		  	} 
	}

		  

}
		?>		

				<form method="post" action="admin_shop_update.php" enctype="multipart/form-data">

		<table>

		<tr align="center">
		<td colspan="7"><label style="font-variant: small-caps; font-weight: 400; font-size: 25px;">Edit Product</label></td>
		</tr>

		<tr>
		<td><span><label>Product Name :</label></span></td>
		<td><input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" readonly=""></td>
		</tr>

		<tr>
		<td><span><label>Product Image :</label></span></td>
		<td><input type="file" name="product_image"></td>
		</tr>

		<tr>
		<td><span><label>Product Quantity :</label></span></b> </td>
		<td><input type="text" name="product_quantity" value="<?php echo $product['product_quantity']; ?>"></td>
		</tr>

		<tr>
		<td><span><label>Product Price :</label></span></td>
		<td><input type="text" name="product_price" value="<?php echo $product['product_price']; ?>"></td>
		</tr>

		<tr>
		<td><span><label>Product Description :</label></span></td>
		<td><textarea name="product_desc" cols="20" rows="5"><?php echo $product['product_desc']; ?></textarea></td>
		</tr>

		<tr>
		<td><span><label>Product Size :</label></span></td>
		<td><input type="text" name="product_size" value="<?php echo $product['product_size']; ?>"></td>
		</tr>

		<tr align="center">
		<td colspan="7"><input type="submit" name="update" value="Update Now" /></td>
		</tr>

		<tr align="center">
	<td colspan="7"><input type="submit" name="delete" value="Delete Item" /></td>
		</tr>

		<tr align="center">
		<td colspan="7"><a href="admin_shop_list.php" style="height: 35px; width: 150; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;"> Check Product List</a></td>
		</tr>

		</table>
		
	</form>
		
			
		</section>

		
		

		<br><br>
		
	</main>

	<hr style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 20px;margin-bottom: 20px;">

	<footer>

		<div class="row-1">

			<div class="col-1">
					
					<ul>
							<center><p style="font-weight: bold; color: white;">SITE LINKS</p></center>
							<br>
							<li><a href="">PROPER STORAGE GUIDELINES</a></li>
							<li><a href="">JUICE CLEAN FAQS</a></li>
							<li><a href="">SHIPPING & DELIVERY </a></li>
							<li><a href="">COD TERMS & CONDITIONS</a></li>
							<li><a href="">TERMS AND CONDITIONS</a></li>
							<li><a href="">REFER A FRIEND</a></li>
						</ul>


			</div>

			<div class="col-1">
					
					<ul>
							<center><p style="font-weight: bold; color: white;">SHARE LINKS</p></center>
							<br>
							<li><a href="https://www.facebook.com/healthyburst.ph"><img id="nav-icon" src="images\icons\fbicon.png" height="20">FACEBOOK</a></li>
							<li><a href="https://instagram.com/healthybursts_online?utm_medium=copy_link"><img id="nav-icon" src="images\icons\insticon.png" height="20">INSTAGRAM</a></li>
							
						</ul>


			</div>

			<div class="col-1">
					
					<ul>
							<center><p style="font-weight: bold; color: white;">CONTACT US</p></center>
							<br>
							<li class="info">1740 Las Piñas, Philippines</li>
							<li class="info">0917 652 9584</li>
							<li class="info">Inquire us at <br> islandbounties@gmail.com</li>
							
						</ul>


			</div>
			
		</div>
		
	</footer>


</div>

</body>
</html>
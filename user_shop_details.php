<?php 

	include 'connect.php';
	session_start();

	if (!isset($_SESSION["email"])) {
			header("location: index.php");
			exit();	
		}

	if(isset($_SESSION['admin'])){
    header('location: admin_index.php');
    exit();
}	

   	if (isset($_GET['logout'])) {

    	$db = new mysqli('localhost', 'root', '', 'healthyburst');
    			mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES ('".$_SESSION["email"]."','Sign-Out',current_timestamp())");

    	if (isset($_SESSION['email'])) {
    	session_destroy();
	  	unset($_SESSION['email']);
	  	header("location: index.php");
	  	exit();
    	}
    	
    	}
   


?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Healthy Burst | Shop Products</title>
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
	
	
}

main section {
	width: 80%;
	height: auto;
	margin-right: auto;
	margin-left: auto;
	
	


}

main section #single_product{
	width: 70%;
	border: 1px solid black;
	margin: auto;
	text-align: center;
	padding: 10px;
	border-radius: 10px;
	background: #FEEFFC;
	

}

main section #single_product p{
	margin-left: auto;
	margin-right: auto;
}
main section #single_product article{
	width: 50%;
	margin-left: auto;
	margin-right: auto;
	margin-top: 15px;
	
}



main section #single_product img{
	width: 50%;
	height: auto;
	margin: 20px 0px 15px 0px;
	margin-left: auto;
	margin-right: auto;
	border-radius: 10px;
	border: 1px solid black;
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

.info-header p{
	font-size: 15px; 
	font-style: italic; 
	color: white;

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
	.dropdown,.dropdown-content a {
	 
	  font-size: 12px;
	}


	main{
		width: 100%;
	}

	main section {
	width: 80%;
	height: auto;
	margin-right: auto;
	margin-left: auto;
	


}

main section #single_product{
	width: 100%;
	border: 1px solid black;
	margin-right: auto;
	margin-left: auto;
	text-align: center;
	padding: 5px;
	border-radius: 5px;
}


main section #single_product article{
	font-size: 12px;
}



main section #single_product img{
	width: 70%;
	height: 50%;
	margin: 15px 0px 15px 0px;
	margin-left: auto;
	margin-right: auto;
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

.info-header p{
	font-size: 12px;
}


	}



	
</style>

</head>
<body>

	<div class="main-container">

		<div class="info-header">
			<p>FREE SHIPPING for orders over Php 2,295 within Metro Manila.</p>
		</div>

	<header>

		

		<div class="container-nav-area">

			<div class="header-logo">

				<a href="index.php">
					
					<img src="images\icons\logo.png" width="190">

				</a>
				
			</div>

				<nav>

					<ul class="nav-link">
						<li><a class="nav-links" href="user_index.php">Home</a></li>
						<li><a class="nav-links" href="user_shop.php">Shop</a></li>
						<li><a class="nav-links" href="user_events.php">Events</a></li>
						<li><a class="nav-links" href="user_aboutus.php">About us</a></li>
						<li>
							<div class="dropdown">
								<span> Account <i class="fa fa-caret-down"></i></span>
							   
							 
							    <div class="dropdown-content">
							      <a href="user_profile.php">Profile</a>
							      <a href="user_index.php?logout='1'">Sign-Out</a>
							    </div>
							</div>
						</li>
						<li><a class="nav-links" href="user_cart.php">Cart</a></li>



						
					</ul>
					
				</nav>
			

		</div>
		
	</header>

	<hr style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 20px;margin-bottom: 20px;">
	

	<main>
		<br>

		<div style=" text-align: center; width: 100%; margin-right: auto; margin-left: auto; background: #3C3C3C; padding: 10px 0px 10px 0px; ">
			<p style="font-size: 20px; font-style: italic; color: white;"> Healthy Burst's Product</p>
		</div>
		<br>

		<section>

			<?php 

      if(isset($_GET['pro_id'])){ 

      $pro_id=trim($_GET['pro_id']) - 0;

   	$addprod = [];
      $sql = "SELECT * FROM product where prod_id ='$pro_id'";
      $run_pro= $db->query($sql);
      
      if ($run_pro->num_rows > 0) {

      while ($row_prod = $run_pro->fetch_assoc()) {
      	
      $addprod["pro_id"] = $row_prod['prod_id'];
      $addprod["pro_name"] = $row_prod ['prod_name'];
      $addprod["pro_price"]=$row_prod ['prod_price'];
      $addprod["pro_quantity"]=$row_prod ['prod_quantity'];
      $addprod["pro_image"]=$row_prod ['prod_image'];
      $addprod["pro_desc"]=$row_prod ['prod_description'];

      
}
  }
}

$prodname = "";
$prodprice = "";
$quantity = "";


  if($_SERVER['REQUEST_METHOD'] == 'POST'){

  			$total_quantity = $addprod["pro_quantity"];


  		$acc_no = $_SESSION['acc_no']; 	

     if (isset($_POST['addtocart'])) {
   $email =  $_SESSION["email"]; 
   $acc_no =  $_SESSION['acc_no']; 	
	$prodname = $_POST['NAME'];
	$price = $_POST['PRODPRICE'];
	$quantity = $_POST['quantity'];

	if ($quantity > $total_quantity) {

		echo "<script>alert('You Have Exceeded the Limit Of Quantity!');</script>";
	}else{

		$item_sql = "SELECT * FROM cart WHERE cart_product='$prodname' AND email ='$email'";
	$res_item = mysqli_query($db, $item_sql);

	if(mysqli_num_rows($res_item) > 0) {
		$totalprice = $quantity * $price;
		$status = "ADDED";
			$cartsql = "INSERT INTO `cart`(`acc_no`, `email`, `cart_product`, `cart_price`, `total_price`, `cart_quantity`,`cart_status`)  
			VALUES ('$acc_no','".$_SESSION["email"]."','$prodname','$price','$totalprice', '$quantity','$status')";

			$res_add = $db->query($cartsql);

			if ($res_add) {
					echo "<script>alert('You have Added Same Item in the Cart');</script>";
				echo "<script>window.location.href='http://localhost/healthyburst_site/user_cart.php'</script>";
			 

			 }
	}
	elseif (mysqli_num_rows($res_item) < 1) {
			
			$totalprice = $quantity * $price;
			$status = "ADDED";
			$cartsql = "INSERT INTO `cart`(`acc_no`,`email`, `cart_product`, `cart_price`, `total_price`, `cart_quantity`,`cart_status`)  
			VALUES ('$acc_no','".$_SESSION["email"]."','$prodname','$price','$totalprice', '$quantity','$status')";

			if ($db->query($cartsql) > 0) {
					echo "<script>alert('New Added in the Cart');</script>";
				echo "<script>window.location.href='http://localhost/healthyburst_site/user_cart.php'</script>";
			 

			 }
	}
		else{

		echo "Error :" . $db -> connect_error();
			 
		}

	}
	
      }

	}

	


    
      	 ?>

     
   <div id='single_product'>
	<form method="POST" enctype="multipart/form-data">
      

 	<span><label for="NAME">

 		<input type="text" name="NAME" value="<?php echo $addprod["pro_name"] ?>" style="font-variant:small-caps; font-size: 20px; border: none; background: #FEEFFC; padding:10px; width: 100%; text-align:center;" readonly=""> 
		
		</label></span>
 		<br>

      <img src="upload_image/<?php echo $addprod["pro_image"] ?>">

      <p><b><label for="PRODPRICE"> Php
      	<input type="text" name="PRODPRICE" value="<?php echo $addprod["pro_price"] ?>" style="font-variant:small-caps; font-size: 20px;background: #FEEFFC;width: 10%; border: none; font-weight: 600; text-align: center; cursor: none;" readonly="">

			
			</label></b></p>

			<br>

      <p><b> <- - Description - -></b></p>



      <article> <?php echo $addprod["pro_desc"] ?> </article>
      <br>

      	<span><b>Available Stocks : </b> <?php echo$addprod["pro_quantity"]?> </span>

      	<br><br>

      	<span><aside><b>Quantity :</b></aside><input type="number" name="quantity"  min="1" style="text-align: center;height: auto; font-size: 20px; width: 40%; color: black;border-radius: 5px;" value="1"></span>

      	<br><br>

      	<span><input type="submit" name="addtocart" style="width: 40%; background: black; padding: 10px; color:white; text-decoration: none; border-radius: 5px; font-size: inherit; font-family: inherit; border:none;" value="Add to Cart"></span>

      	<br><br>

      <a href='user_shop.php' style='background: black; padding: 10px; color:white; text-decoration: none; border-radius: 5px;'>Go Back</a>

    

     	<br><br> 

     </form>

      </div>
     
			
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
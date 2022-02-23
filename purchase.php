<?php 

	session_start();
	include 'connect.php';
	
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
	<title>Healthy Burst | PURCHASING THE ITEM</title>
	<link rel="icon" type="image/x-icon" href="images\icons\icon.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,200;1,400;1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	



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

		main section{
			max-width: 60%;
			margin: auto;
		}

		.p-container{
			max-width: 65%;
			border: 2px black double;
			margin: auto;
			border-radius: 10px;
		}

		.p-header{
		width: 100%;
		text-align: center;

		}
		.p-header img{
			width: 30%;
			height: auto;
			
		}
		.p-header p{
			font-size: 30px;
			font-variant: small-caps;

		}
		.p-body{
			width: 100%;
			
		}
		.input{
			width:100%;
			margin: auto;
			padding: 10px;
			text-align: center;
		}




		.input label{
			font-weight: 600;
			font-size: 18px;
			text-align: left;
		}


		
		.input input[type=text]{
			float: right;
			width: 50%;
			font-size: 15px;
			padding: 5px;
			text-align: center;
			border: none;
		}
		
		.edit{
			width:80%;
			margin-top: 20px;
			padding: 10px;
			height: auto;
			margin: auto;
			display: flex;



		}

		.edit label{
			font-size: 15px;
			text-align: left;
			font-weight: 600;
			flex: 1;
			
		}

		.edit input[type=text]{
			
			width: 55%;
			font-size: 15px;
			padding: 5px;
			text-align: center;
			border: 1px black solid;
			flex: 1;
		

		}

	

		.input input[type=submit]{
			width: 80%;
			border: none;
			background-color: black;
			color: white;
			font-size: 20px;
			padding: 10px;
			border-radius: 5px;
			cursor: pointer;
		}

		.input input[type=submit]:hover{
			background-color: white;
			color: black;
			border: 1px grey solid;
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
				max-width: 100%;
			}

			main section {
				max-width: 90%;
			}

			.p-container{
			max-width: 100%;
			border: 1px black solid;
			margin: auto;
			border-radius: 5px;
		}

		.p-header{
		width: 100%;
		
		text-align: center;

		}
		.p-header img{

			width: 50%;
			height: auto;
			
		}
		.p-header p{
			font-size: 30px;
			font-variant: small-caps;

		}
		.p-body{
			width: 100%;
			
		}
		.input{
			width:100%;
			margin: auto;
			padding: 10px;
			text-align: center;
		}

		.input label{
			font-weight: 600;
			font-size: 13px;
		}
		
		.input input[type=text]{
			float: right;
			width: 50%;
			font-size: 10px;
			padding: 5px;
			text-align: center;
			border: none;
		}

		.input textarea{
			width: 90%;

		}

		.input input[type=submit]{
			width: 90%;
			border: none;
			background-color: black;
			color: white;
			font-size: 15px;
			padding: 10px;
			border-radius: 5px;
			cursor: pointer;
		}

		.input input[type=submit]:hover{
			background-color: white;
			color: black;
			border: 1px grey solid;
		}

		.edit{
			max-width: 100%;
			align-items: center;
		}

		.edit label {
			font-size: 10px;

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
			<p style="font-size: 20px; font-style: italic; color: white;"><img src="images/icons/bill.png"> Check Orders</p>
		</div>
		<br>

		

		<section>

			

					<div class="p-container">

						<form method="POST" action="purchase.php">


							<div class="p-header">

								<img src="images\icons\icon.jpg">
								<p>Purchase Summary</p>

							</div>

							<div class="p-body">

								<?php 



								

								$email = $_SESSION['email'];

					$sql_acc = "SELECT * FROM account WHERE email = '$email'";
					$res_acc = mysqli_query($db, $sql_acc);
					while($row_acc = mysqli_fetch_assoc($res_acc)) {

							$_SESSION['firstname'] = $row_acc["fname"];
							$_SESSION['lastname'] = $row_acc["lname"];
							$_SESSION['address'] = $row_acc["address"];
							$_SESSION['acc_no'] = $row_acc["acc_no"];
							$_SESSION['pnumber'] = $row_acc["phonenumber"];
						}


								$fname = $_SESSION['firstname'];
								$lname = $_SESSION['lastname'];
								$address = $_SESSION['address'];
								$acc_no = $_SESSION['acc_no'];
								$pnumber = $_SESSION['pnumber'];

								$email =  $_SESSION["email"];	

								$query2 = "SELECT SUM(total_price) FROM cart WHERE email = '$email'";
										 $result2 = mysqli_query($db, $query2);
										  if ($rows = mysqli_fetch_array($result2))
										  {
										    $Sum = $rows['SUM(total_price)'];

										    if ($Sum > 2295) {
										    	$Final_amount = $Sum;
										    }else{
										    	$Final_amount = $Sum + 50;
										    }    
										   
										  }

  
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 
		

		 if (isset($_POST['purchase'])) {
		 	$email = $_SESSION['email'];
		 	$cname = $_POST['cname'];
		 	$detail = $_POST['o_detail'];
		 	$edit_ad = $_POST['address'];
		 	$edit_p = $_POST['pnumber'];
		 	$order_no = rand(100000,999999);
			$new_o = 'PROCESSING...';
			$new_s = 'WAITING...';
			$new_a = 'NOT ARCHIVED';


			$sql_item = "SELECT  cart_product, SUM(cart_quantity) AS QUANTITY, cart_status FROM cart WHERE email = '$email' AND cart_status ='ADDED' GROUP BY cart_product HAVING COUNT(cart_product) > 0";

				$res_item = mysqli_query($db, $sql_item);

					if ($res_item->num_rows > 0) {

												while($row_item = mysqli_fetch_assoc($res_item)){
													$item = $row_item["cart_product"];
													$quantity = $row_item["QUANTITY"];

					$u_quantity = "UPDATE product SET prod_quantity = (prod_quantity - '$quantity') WHERE prod_name = '$item'";
					$res_quantity = mysqli_query($db, $u_quantity);	

						}	
			
						}



		 	$order_sql = "INSERT INTO order_detail(order_no, acc_no, order_desc, order_status, ship_status, archive_status) 

		 	VALUES ('$order_no','$acc_no','NAME : $cname <br>ORDER DETAILS :\n$detail\n\nSHIPMENT ADDRESS : $edit_ad\nPHONE NUMBER : $edit_p','$new_o','$new_s', '$new_a')";

			$u_cart = "UPDATE cart SET cart_status = 'ORDERED' WHERE cart_status = 'ADDED' AND email='$email'";

			$res_cart = mysqli_query($db, $u_cart);
		 	$res_order = mysqli_query($db, $order_sql);
		 	
		 	

		 	if ($res_order) {
		 		 
		 		 echo "<script>alert('Thank You For Purchasing Our Product!!!')</script>";
		 		 echo "<script>window.location.href='http://localhost/healthyburst_site/user_cart.php'</script>";
		 	}else{
		 		echo "ERROR:" .$db->error;
		 	}




		 }	


		 }

								 ?>


								<div class="input">
									<label for="acc">ACCOUNT NUMBER : </label>	
									<input type="text" name="acc" value="<?php echo "$acc_no"; ?>" readonly="">
									
								</div>
								<div class="input">
									<label for="cname">CUSTOMER'S NAME : </label>	
									<input type="text" name="cname" value="<?php echo "$fname"." "."$lname"; ?>" readonly="">
									
								</div>
								<div class="input">
									<label for="email">EMAIL : </label>	
									<input type="text" name="email" value="<?php echo "$email"; ?>" readonly="">
									
								</div>
								<div class="input">
									<label for="o_detail">ORDER SUMMARY : </label> <br><br>

									
									<textarea style="resize: none;border: 2px black solid;border-radius: 5px;padding: 5px;height: auto; font-size:15px;" rows="15" cols="40" name="o_detail" id="text" readonly=""><?php 
										$email =  $_SESSION["email"];	
										$address = $_SESSION["address"];
										$pnumber = $_SESSION['pnumber'];
							$sql_item = "SELECT  cart_product, cart_price, SUM(total_price) AS PRICE, SUM(cart_quantity) AS QUANTITY FROM cart WHERE email = '$email' AND cart_status = 'ADDED' GROUP BY cart_product HAVING COUNT(cart_product) > 0";

												$res_item = mysqli_query($db, $sql_item);

												if ($res_item->num_rows > 0) {

												while($row_item = mysqli_fetch_assoc($res_item)){
													$item = $row_item["cart_product"];
													$prod_price = $row_item["cart_price"];
													$total = $row_item["PRICE"];
													$quantity = $row_item["QUANTITY"];

						echo "PRODUCT NAME : $item\nPRICE : Php $prod_price\nQUANTITY : $quantity\nTOTAL ITEM PRICE : Php $total\n";
								}									
											}
										$query2 = "SELECT SUM(total_price) FROM cart WHERE email = '$email' AND cart_status = 'ADDED'";
										 $result2 = mysqli_query($db, $query2);
										  if ($rows = mysqli_fetch_array($result2))
										  {
										    $Sum = $rows['SUM(total_price)'];

										    if ($Sum > 2295) {
										    	$Final_amount = $Sum;
										    	$info = "Php 0.00";
										    }else{
										    	$num = $Sum + 50;
										    	$Final_amount = number_format($num,2);
										    	$info = "Php 50.00";
										    }    
										    echo "SHIPPING FEE : $info\nTOTAL AMOUNT TO PAY : Php $Final_amount\n\n";
										  }

										  echo "Thank you for Shopping at Healthy Burst Website\nVisit us on our Facebook page at Healthy Burst for more info.";
										 
									?></textarea>

								</div>
								<div class="edit">
									<label>PAYMENT METHOD : </label>	
									<input type="text" name="address" value="Cash On Delivery (Default)" readonly="">
									
								</div>
								<div class="edit">
									<label>EDIT ADDRESS : </label>	
									<input type="text" name="address" value="<?php echo $address; ?>">
									
								</div>


								<div class="edit">
									<label>CONTACT # : </label>	
									<input type="text" name="pnumber" value="<?php echo $pnumber; ?>">
									
								</div>
								<br>	
								<div class="input">
									<input type="submit" name="purchase" value="PROCEED NOW" >
									
								</div>

								<div class="input">
									
									<a href="user_cart.php" style="background: black; padding: 10px; color:white; text-decoration: none; border-radius: 5px;"> Back To Cart</a>
									
								</div>

								<br>

																
								</div>


								

							</div>

						</form>
					</div>
				
			

			
				<br><br>

		<div class="note" style="max-width: 80%; margin:auto;">
			<p><strong>Note: </strong>

				<i>Please make sure that your address and contact number is being printed correctly inside the order details, and always check your order details before proceeding to purchase the product.</i>

			</p>
		</div>

		</section>
		<br>

		
		
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


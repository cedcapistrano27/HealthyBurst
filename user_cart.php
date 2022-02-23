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






		
	if (isset($_POST['pay'])) {

		$address = $_SESSION['address'];

		if ($address == '- - Please Input Your Address - -') {
			echo "<script>alert('Please Update Your Profile First . . .')</script>";
			echo "";
			echo "<script> window.location.href='http://localhost/healthyburst_site/user_profile.php' </script>";
	
		}else{
			echo "<script>alert('You are now proceeding to next page.')</script>";
			echo "<script> window.location.href='http://localhost/healthyburst_site/purchase.php' </script>";
			
		}
	}
	

   


 ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Healthy Burst | Add to Cart Area</title>
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

		main section{
				max-width: 80%;
				margin: auto;
				font-family: 'Poppins', sans-serif;


		}

		.cart .cart-area{
    background-color: #E6F9E5;
    margin-right:auto; 
    margin-left: auto;
    border-collapse: collapse;


  }
  
  .cart-area thead{
    background: black;
    
  }
  .cart-area thead tr th{
    color: #fff;
    height: auto;
    text-align: center;
    padding: 10px;
  }
  .cart-area tr td{
  	height: auto;
  	padding: 10px;
  	text-align: left;

  	

  }
  .cart-area tr{
  	border: 1px black solid;
  }

  .cart-area tbody tr td input{
  	padding: 10px;
  	font-size: 14px;
  text-align: center;
  margin-top: 25px;
  font-weight: bold;
  border-radius: 5px;

  }
.cart-area tfoot tr td {
  	padding: 10px;
  	font-size: 15px;
  text-align: center;
  }
.cart-area tr td button{

	width: 20%;
	display: inline-block;

}
.cart-area tr td .quantity{
	width: 50%;
}
.cart-area tfoot tr td{
	border: 1px black solid;


}

  .cart-area tfoot tr td span label{
  	font-weight: 600;
  	width: 100%;
  	padding: 10px;
  	font-size: 18px;
  }

   .cart-area tfoot tr td span input{
  	
 		width: 100%;
  	font-weight: 600;
  	padding: 10px;
  	font-size: 18px;
  	text-align: center;
  	border: 5px black solid;
  	border-radius: 5px;
  }

  		main{
			max-width: 100%;
		}

		main .order-section{
				max-width: 60%;
				margin: auto;
				font-family: 'Poppins', sans-serif;


		}

		.order-section .order{
    background-color: #E6F9E5;
    margin-right:auto; 
    margin-left: auto;
    border-collapse: collapse;
    max-width: 100%;


  }
  
  .order-section .order thead{
    background: black;
    
  }
  .order-section .order thead tr th{
    color: #fff;
    height: auto;
    text-align: center;
    padding: 10px;
  }
  .order-section .order tbody tr td{
  	height: auto;
  	padding: 5px;
  	text-align: left;
  	border: 1px black solid;
  	
  	


  }
  .order-section .order tbody tr td a{
  	background: red;
  	padding: 10px;
  	color:white;
  	text-decoration: none;
  	border-radius: 5px;
  	font-size: 12px;
  	margin: 10px;
  	display: block;
  }


  .order-section .order tr td p{
  	white-space: pre-wrap;
  	max-width: 80%;
  	margin: auto;
  	
  }
  .order-section .order tr{
  	border: 1px black solid;
  }


  .pay{
  	background:black; 
  	color:white; 
  	width:20%; 
  	padding:5px; 
  	font-size:17px; 
  	border-radius: 5px; 
  	font-family:inherit;
  }

  .shop{
  	
  	background: black; 
  	padding: 10px; 
  	color:white; 
  	text-decoration: none; 
  	border-radius: 5px;
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


	main .cart{
	max-width: 90%;
	margin: auto;
	font-size: 10px;
	
}

 .cart .cart-area thead,.cart .cart-area tfoot tr td label{
 	display: none;
 }


 .cart .cart-area tr,  .cart .cart-area td,  .cart .cart-area tbody, .cart .cart-area, .cart .cart-area tfoot{
 	display: block;
 	max-width: 100%;
 	

 }
 .cart .cart-area tr{
 	margin-bottom: 15px;
 	
 }
 .cart .cart-area td{
	border: 1px black solid;
	
 }

 .cart .cart-area tbody tr td{

 	text-align: right;
 	padding: 10px;
 	font-size: 10px;


 }

 .cart .cart-area tbody tr td a{
 	float: right;
 }

 .cart .cart-area td:before{
 	content: attr(data-label);
 	width: 50%;
 	padding: 0px 20px 0px 0px;
 	font-weight: 600;
 	font-size: 15px;
 	text-align: left;
  float: left;
    
 }


		  .cart .cart-area tr td input{

		  	padding: 5px;
		  	margin: 5px;
		  	text-align: center;
		  	width: 60%;
		  	font-size: 12px;
		  	border: none;
		  }
.cart .cart-area tfoot tr td {
		  	font-size: 12px;
		  	border:none;
		  }
.cart .cart-area tfoot tr td:before{
		 	content: attr(data-label);
		 	width: 100%;
		 	font-weight: 600; 
		 	text-align: center;
 }
 
 .pay{
 	width: 50%;
 }
 .shop{

 	font-size: 15px;
 }





	main .order-section{
	max-width: 90%;
	margin: auto;
	font-size: 10px;
	
}

 .order-section .order thead,.order-section .order tfoot tr td label{
 	display: none;
 }


 .order-section .order tr,  .order-section .order td,  .order-section .order tbody, .order-section .order, .order-section .order tfoot{
 	display: block;
 	max-width: 100%;

 	

 }
 .order-section .order tr{
 	margin-bottom: 15px;
 	height: auto;
 	
 }
 .order-section .order td{
	border: 1px black solid;
	
 }


 .order-section .order tbody tr td{

 	text-align: right;
 	padding: 10px;
 	font-size: 10px;
 }
 .order-section .order tbody tr td p{
 	padding: 10px;
 	margin-top: 30px;
 	text-align: left;
 	font-size: 12px;
 }

 .order-section .order tbody tr td a{
 	
 	margin-top: 20px;
 	display: inline-flex;

 }

 .order-section .order td:before{
 	content: attr(data-label);
 	width: 50%;
 	padding: 0px 20px 0px 0px;
 	font-weight: 600;
 	font-size: 15px;
 	text-align: left;
  float: left;
    
 }

		   .order-section .order tfoot td:before{
		 	content: attr(data-label);
		 	width: 100%;
		 	padding: 0px 15px 20px 0px;
		 	font-weight: 600;
 
    
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
			<p style="font-size: 20px; font-style: italic; color: white;"><img src="images/icons/cart.png"> Shopping Cart </p>
		</div>
		<br>

		

		<section class="cart">

			<form method="POST" action="user_cart.php">
				
			
			<table name="cart_area" class="cart-area">
				<thead>
					<tr>
						<th>Items's Name</th>
						<th>Price</th>
						<th>Total Price</th>
						<th>Quantity</th>
						<th>REMOVE</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 

					$email = $_SESSION['email'];

					$sql_acc = "SELECT * FROM account WHERE email = '$email'";
					$res_acc = mysqli_query($db, $sql_acc);
					while($row_acc = mysqli_fetch_assoc($res_acc)) {

							$_SESSION['firstname'] = $row_acc["fname"];
							$_SESSION['lastname'] = $row_acc["lname"];
							$_SESSION['address'] = $row_acc["address"];
							$_SESSION['acc_no'] = $row_acc["acc_no"];
						}

								$fname = $_SESSION['firstname'];
								$lname = $_SESSION['lastname'];
								$address = $_SESSION['address'];
								$acc_no = $_SESSION['acc_no'];


		$query2 = "SELECT SUM(total_price) FROM cart WHERE email = '$email' AND cart_status ='ADDED'";
 $result2 = mysqli_query($db, $query2);
  if ($rows = mysqli_fetch_array($result2))
  {
    $Sum = $rows['SUM(total_price)'];

    if ($Sum > 2295) {
    	$Final_amount = $Sum;
    }else{
    	$Final_amount = $Sum;
    }
    
    
   
  }




  		$sql_item = "SELECT  cart_id, cart_product, cart_price, SUM(total_price) AS PRICE, SUM(cart_quantity) AS QUANTITY, cart_status  FROM cart WHERE email = '$email' AND cart_status ='ADDED' GROUP BY cart_product HAVING COUNT(cart_product) > 0";
			$result = mysqli_query($db, $sql_item);

			if ($result->num_rows > 0) {
				
				while($row = mysqli_fetch_assoc($result)) {
				$_SESSION['item'] = $row["cart_product"];
				$cart_id = $row['cart_product'];
				$prod_price = $row["cart_price"];
				$item_quantity =	$row["QUANTITY"];
				



					echo "<tr row_id='$cart_id'> 
					<td data-label='ITEM NAME :'> <input type='text' name='item_order' value='" .$row["cart_product"]. "' readonly=''></td>" 
					."<td data-label='PRICE :'><input type='text' name='p_price' id='price' value='" .$row["cart_price"]."' readonly=''></td>" 
					."<td data-label=' TOTAL ITEM PRICE : '> <input type='text' name='totalprice' id='totalprice' value='".$row["PRICE"]."' readonly=''></td>"
					."<td data-label='QUANTITY : '> 

				
					<input type='text'  name='quantity' id='quantity' min='1' value='".$row["QUANTITY"]."' readonly=''>
				

						</td>"
					."<td data-label='ACTION :'>

					<a href='delete.php?cart_id=$cart_id' name='remove' style=' background: black; padding: 10px; color:white; text-decoration: none; border-radius: 5px;'>REMOVE</a>
	<br>	<br>


					</td>"
					."</tr>";


				}echo "</tbody>";

						echo "<tfoot>
				<tr>
				<td colspan='3'><span><label>TOTAL AMOUNT TO PAY :</label></span></td>
				<td data-label='TOTAL AMOUNT TO PAY :' colspan='2'><span><input type='text' value='Php $Final_amount' readonly=''></span>
				</td>
				</tr>
				</tfoot>";
			
				echo "</table>";

				echo "

					<br>

					<br>
		
					<input type='submit' name='pay' class='pay' style='' value='Proceed To Pay'>

					

					<br>
						<br>
							<br>
					


					<a href='user_shop.php' class='shop'> Click Here to Add more</a>

				";
				

			}else{
				echo '"<center><h3>"No Items Found in this Cart</h3>"';
				echo "<br>";
				echo "<br>";
				echo "<a href='user_shop.php' style='width: 40%px; background: black; padding: 10px; color:white; text-decoration: none; border-radius: 5px;'> Click Here to Add Items</a></center>";
				
				echo "<br>";
				echo "<br>";

				
			}

		
			 ?>
				</tbody>
				
			</table>
	<br><br>

		




			</form>
				<br><br>

		<div class="note">
			<p><strong>Note:</strong>

				<i>If you want to change/remove the quantity of your choices, then you must click "REMOVE" button to clear the existing product into your cart, then make a renew add item into your cart.</i>

			</p>
		</div>

		</section>
		<br><br>

					<div style=" text-align: center; width: 100%; margin-right: auto; margin-left: auto; background: #3C3C3C; padding: 10px 0px 10px 0px; ">
			<p style="font-size: 20px; font-style: italic; color: white;"><img src="images/icons/box.png"> Recent Orders</p>
		</div>

		<section class="order-section">

				<br><br>
			

			<table class="order">
				<thead>
					<tr>
						<th>ORDER # </th>
						<th>ORDER DETAILS </th>
						<th>DATE OF ORDER</th>
						<th>ACTION</th>
				
						
					</tr>
				</thead>
				<tbody>
					<?php 

								$email = $_SESSION['email'];
								$fname = $_SESSION['firstname'];
								$lname = $_SESSION['lastname'];
								$address = $_SESSION['address'];
								$acc_no = $_SESSION['acc_no'];
	



;

			$res_o = mysqli_query($db, "SELECT * FROM order_detail WHERE acc_no = '$acc_no' AND order_status ='PROCESSING...' AND order_date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY order_date DESC");

			if ($res_o->num_rows > 0) {
				
				while($row = mysqli_fetch_assoc($res_o)) {
				
				$order_id = $row['order_id'];
				$order_no = $row['order_no'];
				$acc_no =	$row['acc_no'];
				$order_desc =	$row['order_desc'];
				$order_status =	$row['order_status'];
				$ship_status =	$row['ship_status'];
				$order_date =	$row['order_date'];

				
					echo "<tr row_id='$order_id'> 
					<td data-label='ORDER # :'> $order_no </td>" 
					."<td data-label='DETAILS'><p>$order_desc</p></td>"
					."<td data-label='DATE OF ORDER'>$order_date</td>"  
					//."<td data-label='ORDER STATUS'> $order_status</td>"
					//."<td data-label='DELIVERY STATUS'> $ship_status</td>"
					."<td data-label='ACTION'><a href='delete_cancel.php?order_id=$order_id'>Cancel</a><br></td>"
					."</tr>";

				
				}
				echo "</tbody>";

				echo "</table>";

		
				

			}else{
				echo '<center><h3>"No Recent Orders"</center></h3>';
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}

			
			 ?>
				</tbody>
				
			</table>

			<br><br>

			<div class="note">
			<p><strong>Note:</strong>

				<i>In this table, You will see your current orders. </i>

			</p>
		</div>
		</section>

		
		
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

<script>
	
let btnadd = document.querySelector('#add');
let btnsub =document.querySelector('#sub');
let input = document.querySelector('input');



</script>

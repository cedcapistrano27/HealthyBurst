<?php 
		session_start();
		require_once 'connect.php';

	

if(isset($_SESSION['email'])){
    header('location: user_index.php');
    exit();
}

if(isset($_SESSION['admin'])){
    header('location: admin_index.php');
    exit();
}

		$password = '';
		$username = '';
		$errors = $arrayName = array();

		$admin='Admin';

if (isset($_POST['signin'])) {


  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
    array_push($errors, "E-Mail is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = $password;
    $query = "SELECT * FROM account WHERE email='$email' AND password='$password'"; 
    $results = mysqli_query($db, $query);
 

    if (mysqli_num_rows($results) == 1) {
    	
    	
    	$user_results = mysqli_query($db, "SELECT * FROM account WHERE email='$email' AND acc_id=acc_id");
    	


						while ($row = mysqli_fetch_array($user_results)) {



						if ($admin == $row['user_type']) {

							mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES (' Admin $email','Sign-In',current_timestamp())");

						$_SESSION['id'] = $row["acc_id"];
						$_SESSION['admin'] = $row['user_type'];
						$_SESSION['emailadmin'] = $row['email'];
						$_SESSION['firstname'] = $row["fname"];
						$_SESSION['lastname'] = $row["lname"];
						echo "<script> alert('You Are Now Logged-In! Welcome Admin User.');</script>";
						echo "<script> window.location.replace('http://localhost/healthyburst_site/admin_index.php');</script>";
							
						}else{

							mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES ('$email','Sign-In',current_timestamp())");

								$_SESSION['id'] = $row["acc_id"];
								$_SESSION['email'] = $row["email"];
								$_SESSION['firstname'] = $row["fname"];
								$_SESSION['lastname'] = $row["lname"];
								$_SESSION['acc_no'] = $row["acc_no"];


								echo "<script> alert('You Are Now Logged-In! Welcome User.');</script>";
								echo "<script> window.location.replace('http://localhost/healthyburst_site/user_index.php');</script>";

						}


					
		
					}
					

    }else {
      array_push($errors, "Invalid password/username. Please Try again");
    }


  }

  	
       
  		

}


 ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Healthy Burst | Sign-In Account</title>
	<link rel="icon" type="image/x-icon" href="images\icons\icon.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,200;1,400;1,500&display=swap" rel="stylesheet">
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



main{
	max-width: 100%;
	
	
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

main{
	width: 100%;
}

main .form-area{
	
	width: 50%;
	margin: 20px 0px 20px 0px;
	margin-left: auto;
	margin-right: auto;
}

 main .form-area .form-container{
 	
 	width: 70%;
 	margin: 10px 0px 10px 0px;
	margin-left: auto;
	margin-right: auto;
 }

  main .form-area .form-container .form-input{
  	
 	width: 90%;
 	margin: 10px 0px 10px 0px;
	margin-left: auto;
	margin-right: auto;
	display: flex;
  }
  main .form-area .form-container .form-input span{
  	flex: 1;
  	font-size: 15px;
  }
  main .form-area .form-container .form-input input{
  	height: 30px;
  	flex: 1;
  	font-size: 17px;
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

	main .form-area{
	
	width: 80%;
	margin: 15px 0px 15px 0px;
	margin-left: auto;
	margin-right: auto;
}
main .form-area .form-container .form-input {
	display: block;
}
	main .form-area .form-container .form-input span{
		display: block;

	}

	main .form-area .form-container .form-input input{
		width: 100%;
		display: block;
		border: 2px solid black;
	}

	main .form-area .form-header img{
		width: 80px;
		margin: auto;

	}
	main .form-area .form-container a{
		width: 100%;
		display: block;
		
	}
	main .form-area .form-header h2{
		font-weight: 500;
		font-size: 14px;
		font-style: italic;
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
						<li><a class="nav-links" href="index.php">Home</a></li>
						<li><a class="nav-links" href="shop.php">Shop</a></li>
						<li><a class="nav-links" href="events.php">Events</a></li>
						<li><a class="nav-links" href="aboutus.php">About us</a></li>
						<li><a class="nav-links" href="login.php">Account</a></li>
						<li><a class="nav-links" href="cart.php">Cart</a></li>



						
					</ul>
					
				</nav>
			

		</div>
		
	</header>

	<hr style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 20px;margin-bottom: 20px;">
	

	<main>

		<br>

			<div class="form-area">
			<form method="POST" action="login.php">

				<div class="form-header" style="width: 50%; margin: auto;text-align: center; padding: 10px;">

					<img src="images\icons\user.png" width="120"><br>
					<h2>Sign In Your Account</h2>

					<span><?php include 'error.php'; ?></span>
					
				</div>

					


				<div class="form-container">

				<div class="form-input">
					<span><label>Enter E-Mail:</label></span>
					<input type="text" name="email">
				</div>

				<div class="form-input">
					<span><label>Enter Password:</label></span>
					<input type="password" name="password">
				</div>

				<div class="form-input">
					<input type="submit" name="signin" style="height: 35px; width: 100%; margin-top: 20px; margin-right: auto; margin-left: auto; margin-bottom: 10px; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px; cursor: pointer;" value="SIGN IN">
				</div>
				<div class="form-input">
					<a href="register.php" style="height: 35px; width: 100%; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3;">CREATE ACCOUNT</a>  
				</div>	
				</div>
			</form>
		</div>
		

		<br><br><br>

		<hr style="width: 90%; margin-left: auto; margin-right: auto;">

		<br><br>
		
	</main>

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
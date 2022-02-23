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
    		mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES ('".$_SESSION["emailadmin"]."','Sign-Out',current_timestamp())");

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
	<title>Healthy Burst | Change Password </title>
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
		width: 45%;
		margin-left: auto;
		margin-right: auto;
		
	}

	main section .user_info{
		font-size: 15px;
		text-align: center;


	}

	main section .user_info table{
		width: 100%;
		margin-left: auto;
		margin-right: auto;
		


	}
	main section .user_info table td{
		padding: 10px;
	}
	main section .user_info table td input[type=text], main section .user_info table td input[type=password]{
		padding: 5px;
		width: 100%;
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


	main section{
		width: 80%;
		margin-left: auto;
		margin-right: auto;
		
	}

	main section .user_info{
		font-size: 12px;
		text-align: center;


	}

	main section .user_info table{
		width: 100%;
		margin: auto;
	}
	main section .user_info table td{
		padding: 5px;
	}
	main section .user_info table td input[type=text], main section .user_info table td input[type=password]{
		padding: 5px;
		width: 100%;
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
			<p style="font-size: 20px; font-style: italic; color: white;"> Your Profile : 

			<?php 
			echo $_SESSION['firstname']; ?></p>
		</div>
		<br>

		<section>

<div class="user_info">


	<?php 


		require_once 'connect.php';

		$id = $_SESSION['id'];
		$errors = $arrayName = array();

		$user = [];
	  $sql = "SELECT * FROM account WHERE acc_id = $id";
	  $result = $db->query($sql);
	  if($result->num_rows > 0){
    	while($row = $result->fetch_assoc()){
    		$user["acc_no"] = $row['acc_no'];
    	}
    }
   

   if (isset($_POST['change']))
  {
      $acc_no = $_POST['acc_no'];
      $newpass = $_POST['pass1'];
      $conpass = $_POST['pass2'];
      $password = $conpass;
      $sql = ("SELECT * FROM account WHERE acc_no ='$acc_no'");
      $result = mysqli_query($db,$sql);
      
      if ($row = mysqli_fetch_array( $result ))
      {
          if ($newpass == $conpass)
        		{
        			mysqli_query($db, "INSERT INTO event_log( event_user, event_activty, event_timestamp) VALUES ('".$_SESSION["email"]."','Changed Password',current_timestamp())");
        			$query2 = "UPDATE account SET password = '$password' WHERE acc_no = '$acc_no'";
    				mysqli_query($db, $query2);
    				echo "<script> alert('You Have Successfully Changed Your Password!');</script>";
    				echo "<script> window.location.replace('http://localhost/healthyburst_site/user_profile.php');</script>";
    			}
    			else
    			{
    				echo '<script>alert("Passwords do not Match!")</script>'; 
    			}
        	}
        }



	 ?>

	<form method="POST" action="changepass.php">

		<table>
				<thead> Edit Password</thead>

				<center><?php include('error.php'); ?></center>
				<tbody>
					<tr>
						<td><span>Account Number :</span></td>
						<td style='text-align:left;'><input type="text" name="acc_no" value="<?php echo $user["acc_no"];?>" readonly=""></td>
					</tr>

					<tr>
						<td><span>New Password :</span></td>
						<td style='text-align:left;'><input type="password" name="pass1" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"></td>
					</tr>

					<tr>
						<td><span>Confirmed Password :</span></td>
						<td style='text-align:left;'><input type="password" name="pass2" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"></td>
					</tr>

					<tr>
						<td colspan="2">
							<input type="submit" name="change" value="Change Password" style='height: auto; width: 150; margin-right: auto; margin-left: auto; font-size: 15px; text-align: center; background: #131313; color: #E1E1E1; border-radius: 5px; cursor: pointer; padding: 10px; '>

							</td>
					</tr>

				</tbody>
			</table>
			<br>	

</form>

			<a href="user_profile.php" style='height: 35px; width: 150; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;'> Go Back To Your Profile</a> <br><br> 

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
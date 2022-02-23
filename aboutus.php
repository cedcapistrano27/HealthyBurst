<?php 

	session_start();

	if(isset($_SESSION['email'])){
    header('location: user_index.php');
    exit();
}

if(isset($_SESSION['admin'])){
    header('location: admin_index.php');
    exit();
}


 ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Healthy Burst | About Us</title>
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

main .container-info{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
} 

main .container-info .set1{
	width: 80%;
	margin: auto;
	padding: auto;
	background-image: linear-gradient(to top right, #B8F9AA, #33F608  );
	padding: 20px 0px 20px 0px;
	border-radius: 15px;
}

main .container-info .set2{

	width: 70%;
	margin: 20px 0px 0px 20px;
	margin-left: auto;
	margin-right: auto;


}



main .set1 .set-photo1,main .set1 .set-photo2{
	display: flex;
	
}
main .container-info .set-photo2 #productimg{
	flex: 1;
	text-align: right;
	margin-right: 30px;
}
main .container-info .set-photo1 #productimg{
	flex: 1;
	text-align: center;
	margin-right: 50px;
}
main .container-info .set-photo1 #productimg img, main .container-info .set-photo2 #productimg img{
	width: 120px;
	height: 170px;
	border-radius: 15px;
	


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

	main .container-info{
	width: 90%;
	margin-left: auto;
	margin-right: auto;
} 

main .container-info .set1{
	width: 100%;
	margin: auto;
	padding: auto;
	background-image: linear-gradient(to top right, #B8F9AA, #33F608  );
	padding: 20px 0px 20px 0px;
	border-radius: 15px;
	display: flex;
	flex-direction: column;
}

main .container-info .set2{

	width: 90%;
	margin: 20px 0px 0px 20px;
	margin-left: auto;
	margin-right: auto;


}



main .set1 .set-photo1,main .set1 .set-photo2{
	display: flex;
	flex-direction: column;
	
}

main .container-info .set-photo2 #productimg,main .container-info .set-photo1 #productimg{
	text-align: center;
	margin-top: 10px;
	margin-right: auto;
	margin-left: auto;
	}


main .container-info .set-photo1 #productimg img, main .container-info .set-photo2 #productimg img{
	width: 120px;
	height: 170px;
	border-radius: 15px;
	display: inline-block;


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

		<div style=" text-align: center; width: 100%; margin-right: auto; margin-left: auto; background: #3C3C3C; padding: 10px 0px 10px 0px; ">
			<p style="font-size: 20px; font-style: italic; color: white;"> About In Healthy Burst</p>
		</div>
		<br>

		<div class="container-info">

			


			<div class="set1">

			<div class="set-photo1">

				<div id="productimg"><img src="images\product\set_photo1.jpg"><br><span><label style="font-style: italic;">Bottle of Guyabano</label></span></div>
				<div id="productimg"><img src="images\product\set_photo2.jpg"><br><span><label style="font-style: italic;">Bottle of Dalandan</label></span></div>
			</div>

			<div class="set-photo2">

				<div id="productimg"><img src="images\product\set_photo3.jpg"><br><span><label style="font-style: italic;">Bottle of Calamansi</label></span></div>
				<div id="productimg"><img src="images\product\set_photo4.jpg"><br><span><label style="font-style: italic;">Bottle of Mangosteen</label></span></div>
			</div>

			</div>


			<div class="set2">

				<article><b>Island Bounties Trading</b> started in a small Bazaar in 2013, it is a family business of selling one flavor concentrate juice and evolved to 4 flavors of concentrate and 2 ready to drink juices, they supplies to schools, hospitals and canteen in companies, nowadays resellers are welcome to distribute pure products.</article>

					<br>
				<article>The company sells the following juice concentrates:
				Guyabano, Calamansi, Dalandan, and Mangosteen with Calamansi. It also sells ready to drink Calamansi and Dalandan Juices.
				All of company's products are under a tolling agreement with <i>FDA Approved Manufactures</i>.</article>
				
			</div>


			<div class="btn-link" style="width: 70%; margin-right: auto; margin-left: auto; margin-top: 20px;">
				<span><p><i>To know more About Us, Press The Button Below.</i></p></span>
				<br>
				<a href="https://www.facebook.com/healthyburst.ph" style="height: 35px; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;">Click Me!</a>  
			</div>
			
		</div>



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
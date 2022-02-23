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
	<title>Healthy Burst | Product List</title>
	<link rel="icon" type="image/x-icon" href="images\icons\icon.jpg">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,700;1,200;1,400;1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <!-- Popper JS -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	 <!-- Latest compiled JavaScript -->
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script>


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

.prodtable {
	width: 80%;
	margin-left: auto;
	margin-right: auto;
	height: auto;
	
}

.prodtable table{
	
	margin-left: auto;
	margin-right: auto;
	width: 100%;
		
}


  table{
    background-color: #F4F1F1;
    margin-right:auto; 
    margin-left: auto;
    border-collapse: collapse;


  }
  
 .prodtable table thead{
    background: black;
    width: auto;
    
  }
 .prodtable table thead tr th{
    color: #fff;
    height: auto;
    text-align: center;
    padding: 10px;
  }

  .prodtable table tr{
  	border: 1px black solid;
  }
 .prodtable table tr td{
  	height: auto;
  	padding: 10px;
  	text-align: center;
  	width: auto;
  
  }

  .prodtable table tr td p{
  	width: 100%;
  	
  	margin: auto;
  	white-space: pre-wrap;
  	text-align: left;
  	padding: 5px;
  }

  .search{ 
 	max-width: 80%;

 

 }

 .search input{
 	
 	width: 50%;
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
	.dropdown,.dropdown-content {
	  font-size: 12px;
	}


	main{
		width: 100%;
		font-size: 10px;
	}

	main section {
	width: 90%;
	margin: auto;
	height: auto;
	
}


 table thead{
 	display: none;
 }


 table tr,  table td,  table tbody, table{
 	display: block;
 	max-width: 100%;
 	height: auto;
 	

 }
 table tr{
 	margin-bottom: 15px;

 	
 }

 table tbody tr td{
 
 	text-align: right;
 	height: auto;
 	border: 1px black solid;
 	padding:15px;


 }

 table tbody tr td p{
 

 }

 table td:before{
 	content: attr(data-label);
 	width: 50%;
 	font-weight: 600;
 	text-align: left;
 	float: left;
 
    
 }
 .search{ 
 	max-width: 100%;
 	margin: auto;
 	font-family: inherit;
 }

 .search label{
 	font-weight: bold;
 	float: left;

 }

 .search input{
 	float: right;
 	width: 60%;

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
<script>
  $(document).ready(function(){
    $('table tr').click(function(){
      var id = $(this).attr('row_id');
     	window.location.replace("http://localhost/healthyburst_site/admin_shop_update.php?id="+ id);
    });
  });
</script>

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
	<div style=" text-align: center; width: 100%; margin-right: auto; margin-left: auto; background: #3C3C3C; padding: 10px 0px 10px 0px; ">
			<p style="font-size: 20px; font-style: italic; color: white;"> Product Area</p>
		</div>

	<!--<hr style="width: 90%; margin-left: auto; margin-right: auto; margin-top: 20px;margin-bottom: 20px;">-->
	

	<main>


		
		<br>

		<section class="prodtable">

	<br>
			
		<br>

		<div class="search">
			<label for="search">SEARCH : </label><input type="text" id="search" onkeyup="myFunction()" placeholder="Item Name..." style=" font-size: inherit; text-align: center;padding: 5px;">
		

	<br>
	</div>

	<br>	<br>


		<table id="searcharea">
		<thead>
			<tr>
				<th>PRODUCT NAME</th>
				<th>PRODUCT PRICE</th>
				<th>PRODUCT SIZE</th>
				<th>PRODUCT QUANTITY</th>
				<th>PRODUCT DESCRIPTION</th>
				<th>PRODUCT IMAGE</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			include 'connect.php';

			

			
 
			$result = mysqli_query($db, "SELECT * FROM product");

			if ($result->num_rows > 0) {
				
				while ($row = mysqli_fetch_assoc($result)) {

					echo "<tr row_id='".$row['prod_id']. "'> 
					<td data-label='Item Name :'>" .$row["prod_name"]. "</td>" 
					."<td data-label='Item Price :'>" .$row["prod_price"]. "</td>" 
					."<td data-label='Item Size :'>" .$row["prod_size"]. "</td>"
					."<td data-label='Item Quantity :'>" .$row["prod_quantity"]. "</td>"
					."<td data-label='Description :'>

					<p><br>" .$row["prod_description"]. "</p>

					</td>"
					."<td data-label='Image Name :'>" .$row["prod_image"]. "</td>"
					."</tr>";
				}
				echo "</table>";
				

			}else{
				echo "0 results";
			}

			$db->close();


			 ?>
			
		</tbody>
	</table>

		
			
		</section>
		<br><br>

		<center><a href="admin_shop.php" style="height: 35px; width: 150; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #E1E1E1; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;"> Go Back to Insert Product</a>  
</center>
		
		

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

<script>
function myFunction() {
  var input, filter, table, table_row, table_data, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("searcharea");
  table_row = document.getElementsByTagName("tr");
  for (i = 0; i < table_row.length; i++) {
    table_data = table_row[i].getElementsByTagName("td")[0];
    if (table_data) {
      txtValue = table_data.textContent || table_data.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        table_row[i].style.display = "";
      } else {
        table_row[i].style.display = "none";
      }
    }       
  }
}
</script>
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

 error_reporting(0);

$cancel = $_GET['order_id'];

$c_sql = "SELECT * FROM order_detail WHERE order_id ='$cancel'";

$res_u = mysqli_query($db, $c_sql);

if ($res_u) {

$email = $_SESSION['email'];

$sql_item = "SELECT  cart_product, SUM(cart_quantity) AS QUANTITY, cart_status FROM cart WHERE email = '$email' AND cart_status ='ORDERED' GROUP BY cart_product HAVING COUNT(cart_product) > 0";

				$res_item = mysqli_query($db, $sql_item);

					if ($res_item->num_rows > 0) {

												while($row_item = mysqli_fetch_assoc($res_item)){
													$item = $row_item["cart_product"];
													$quantity = $row_item["QUANTITY"];

					$u_quantity = "UPDATE product SET prod_quantity = (prod_quantity + '$quantity') WHERE prod_name = '$item'";
					$res_quantity = mysqli_query($db, $u_quantity);

					$u_cart = "UPDATE cart SET cart_status = 'CANCELLED' WHERE cart_product = '$item' AND cart_status='ORDERED' AND email='$email' AND cart_date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY cart_date ASC";
					$res_cart = mysqli_query($db, $u_cart);




						}	
			
						}
						$del_order = "DELETE FROM order_detail WHERE order_id = '$cancel'";
						$res_del = mysqli_query($db, $del_order);
						$del_order = "DELETE FROM cart WHERE cart_status = 'CANCELLED'";
						$res_del = mysqli_query($db, $del_order);


						if ($res_del) {
						echo "<script>alert('Successfully Cancelled The Order');</script>";
						echo "<script>window.location.href='http://localhost/healthyburst_site/user_cart.php'</script>";
						}
						
}






?>
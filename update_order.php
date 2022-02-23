<?php 

include 'connect.php';
error_reporting(0);

$order_id = $_GET['order_id'];

$sql ="SELECT * FROM order_detail WHERE order_id = '$order_id'";

	$res_sql = mysqli_query($db, $sql);

		while ($row = mysqli_fetch_assoc($res_sql)) {

			$acc_no = $row['acc_no'];

			$update_cart = "UPDATE cart SET cart_status='PURCHASED' WHERE acc_no ='$acc_no' AND cart_status='ORDERED'";
			$res_cart= mysqli_query($db, $update_cart);
		}															
$u_sql = "UPDATE order_detail SET order_status='Checked', ship_status ='Shipping the Order' WHERE order_id ='$order_id'";

			$res_u = mysqli_query($db, $u_sql);

			if ($res_u) {
				echo "<script> alert('You Have Processed The Order!') </script>";
				echo "<script> window.location.href='http://localhost/healthyburst_site/admin_orderdetails.php' </script>";
			}

			


			

?>

<?php 

include 'connect.php';

error_reporting(0);

$ship_no = $_GET['ship_id'];

$res_ship = mysqli_query($db, "UPDATE order_detail SET ship_status='ALREADY DELIVERED' WHERE order_no ='$ship_no'");


if ($res_ship) {
	echo "<script> alert('You Have Updated The Status!') </script>";
	echo "<script> window.location.href='http://localhost/healthyburst_site/admin_shipmentdetails.php' </script>";
}



 ?>
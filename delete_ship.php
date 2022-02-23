<?php 

include 'connect.php';

error_reporting(0);

$ship_no = $_GET['ship_no'];

$s_ship = "SELECT * FROM order_detail where order_no ='$ship_no'";
$res_sql = mysqli_query($db, $s_ship);

if ($row_h = mysqli_fetch_assoc($res_sql)) {
	
	$_SESSION['ship_order'] = $row_h["order_no"];
	$_SESSION['ship_desc'] = $row_h["order_desc"];

$ship_order = $_SESSION['ship_order'];
$ship_desc = $_SESSION['ship_desc'];

$h_sql = "INSERT INTO shipment_detail(ship_order, ship_desc) VALUES ('$ship_order','$ship_desc')";
$res_ship = mysqli_query($db, $h_sql);

$u_sql = "UPDATE order_detail SET archive_status = 'ARCHIVED' WHERE order_no ='$ship_no'";
$del_res = mysqli_query($db, $u_sql);

if ($del_res) {
	echo "<script> alert('You have successfully archived a row!') </script>";
	echo "<script> window.location.href='http://localhost/healthyburst_site/admin_shipmentdetails.php' </script>";
}
}





 ?>
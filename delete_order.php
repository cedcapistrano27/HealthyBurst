<?php 

include 'connect.php';
error_reporting(0);

$order_no = $_GET['order_no'];

 
$u_sql = "DELETE FROM order_detail WHERE order_no ='$order_no'";

$res_u = mysqli_query($db, $u_sql);

if ($res_u) {
	echo "<script> alert('You Have Deleted The Order!') </script>";
	echo "<script> window.location.href='http://localhost/healthyburst_site/admin_orderdetails.php' </script>";
}

?>
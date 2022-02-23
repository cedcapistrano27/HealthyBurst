<?php 

include 'connect.php';

error_reporting(0);

$cartID = $_GET['cart_id'];
$cart_sql = "DELETE FROM cart WHERE cart_product = '$cartID'";

$res_cart = mysqli_query($db, $cart_sql);

if ($res_cart) {
	echo "<script> alert('You Have Remove An Item!') </script>";
	echo "<script> window.location.href='http://localhost/healthyburst_site/user_cart.php' </script>";
}


 ?>
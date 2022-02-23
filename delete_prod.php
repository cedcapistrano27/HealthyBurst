<?php 

include 'connect.php';
error_reporting(0);

$item = $_GET['delete_item'];

 


$res_u = mysqli_query($db, "DELETE FROM product WHERE prod_name ='$item'");

if ($res_u) {
	echo "<script> alert('You Have Deleted The Item!') </script>";
	echo "<script> window.location.href='http://localhost/healthyburst_site/admin_shop_list.php' </script>";
}

?>
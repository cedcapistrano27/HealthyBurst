<?php 

include 'connect.php';

error_reporting(0);

$acc = $_GET['acc_id'];
$acc_sql = "DELETE FROM account WHERE acc_id = '$acc'";

$res_acc = mysqli_query($db, $acc_sql);

if ($res_acc) {
	echo "<script> alert('You Have Remove A User Account!') </script>";
	echo "<script> window.location.href='http://localhost/healthyburst_site/admin_checkuser.php' </script>";
}




?>
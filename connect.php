<?php 

	
	$dbhost ='localhost';
	$dbuser ='root';
	$dbpass ='';
	$dbname ='healthyburst';


	$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if ($db->connect_error) {

		die("CONNECTION FAILED :" .$db->connect_error);
	}else{
		echo "";
	}




 ?>
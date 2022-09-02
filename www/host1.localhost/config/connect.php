<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "ABC#1234";
	$database = "userdata";

	$link = mysqli_connect($serverName, $userName, $password, $database);

	if (!$link){
		die("Error" . mysqli_connect_error());
	}
	else{
		echo "Success";
	}

	//phpinfo();
 ?>
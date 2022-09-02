<?php

	require_once '../config/connect.php'; //connect to db

	//delete a row
	$id = $_GET['id'];

	mysqli_query($link, query:"DELETE FROM users WHERE users . id = '$id'");

	header('Location: /user-data.php');



 ?>
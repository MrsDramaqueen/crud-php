<?php

	require_once 'config/connect.php'; //connect to db

	//for transition of needed string
	$user_id = $_GET['id'];
	$user = mysqli_query($link, query: "SELECT * FROM users WHERE id = '$user_id'");
	$user = mysqli_fetch_assoc($user);


 ?>
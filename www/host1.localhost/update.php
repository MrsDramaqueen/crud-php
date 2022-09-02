<?php

	require_once 'config/connect.php'; //connect to db

	//for transition of needed string
	$user_id = $_GET['id'];
	$user = mysqli_query($link, query: "SELECT * FROM users WHERE id = '$user_id'");
	$user = mysqli_fetch_assoc($user);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<title>Update Users</title>
</head>
<body>
	<div>
		<center><h3>Update user</h3></center>
	</div>

	<!-- Form for update users data -->
	<div class="contanier" style="margin: 15px 105px;  ">
		<div class="row ">
			<div class="col-md-6 offset-md-3">
				<form action="vendor/update.php" method="post">
				<input type="hidden" name="id" value="<?= $user['id']?> ">
			        <div class="form-group">
			        	<p>Login</p>
				 		<input type="text" class="form-control" name="login" value="<?= $user['Login'] ?>">
				 	</div>

				 	<div class="form-group">
				 		<p>Password</p>
				 		<input type="text" class="form-control" name="password" value="<?= $user['Password'] ?>">
				 	</div>

				 	<div class="form-group">
				 		<p>First Name</p>
				 		<input type="text" class="form-control" name="firstName" value="<?= $user['FirstName'] ?>">
				 	</div>

				 	<div class="form-group">
				 		<p>Last Name</p>
				 		<input type="text" class="form-control" name="lastName" value="<?= $user['LastName'] ?>">
				 	</div>

				 	<div class="form-group">
				 		<p>Gender</p>
				 		<input type="radio"  name="gender" required="required" value="Male">
				 		<label for="genderChoice1">Male</label>

				 		<input type="radio" name="gender" value="Female">
				 		<label for="genderChoice2">Female</label>
				 	</div>

				 	<div class="form-group">
				 		<p>Date of Birth</p>
					 	<input type="date" class="form-control" name="dob" value="<?= $user['DOB'] ?>"><br> <br>
					 </div>

					 <button type="submit" class="btn btn-primary">Update</button>

		 		</form>
	 		</div>
	 	</div>
 	</div>
</body>
</html>
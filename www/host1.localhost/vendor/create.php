<?php


	require_once '../config/connect.php'; //connect to db


	$login = $_POST['login'];
	$password = $_POST['password'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];

	//for checking duplicate login
	$checkLogin = "SELECT * FROM users WHERE login='$login'";

	$result = mysqli_query($link, $checkLogin);

	$count = mysqli_num_rows($result);

	//checking for prevention of entered too long string
	if(strlen($_POST['login']) > 30 || strlen($_POST['password']) > 20 || strlen($_POST['firstName']) > 20 || strlen($_POST['lastName']) > 20){

		$incorrect = "Incorrect data. Please, return and try again!!!";

		?>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<div>
        	<center>
	        	<h4><?= $incorrect ?></h4>
				<a class="btn btn-danger" href="../user-data.php">Return To User Table</a>
			</center>
		</div>
		<?php
	}
	else{

		//checking duplicate login
		if(!$count){

			if (isset($_POST['add'])) {
				$sql = ("INSERT INTO users (id, login, password, firstName, lastName, gender, dob) VALUES (?,?,?,?,?,?,?)");
				$query = $link->prepare($sql);
				$query->execute([NULL, $login, $password, $firstName, $lastName, $gender, $dob]);
				if ($query){
					header('Location: /user-data.php');
				}
			}
		}
		else {

			$duplicate = "Duplicate Login!!!";

			?>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<div>
	        	<center>
		        	<h4><?= $duplicate ?></h4>
					<a class="btn btn-danger" href="../user-data.php">Return To User Table</a>
				</center>
			</div>
			<?php
		}
	}


 ?>
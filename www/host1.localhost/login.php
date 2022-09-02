<?php
$title="Authorization";

 require_once 'config/connect.php'; // connect to DB
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container mt-4">
		<div class="row">
			<div class="col">
		<!-- Authorization Form -->
		<center><h2>Authorization</h2></center>
		<form action="login.php" method="post">
			<input type="text" class="form-control" name="login" id="login" placeholder="Enter login" required><br>
			<input type="password" class="form-control" name="password" id="pass" placeholder="Enter password" required><br>

		<!-- simple checking of the correct entered data (login and password)-->
			<?php

				if ((isset($_POST['login'])) && (isset($_POST['password'])) ){
					if (($_POST['login'] == $userName) && ($_POST['password'] == $password)){
						header('Location: /user-data.php');
					}
					else echo "Incorrect Login or Password. Please, try again <br>";
				}

			 ?>
			<button class="btn btn-success" name="do_login" type="submit">Log In</button>
		</form>
		<br>

		<!--Link for return to Main Page -->
		<p>Вернуться на <a href="index.php">главную</a>.</p>
			</div>
		</div>
	</div>



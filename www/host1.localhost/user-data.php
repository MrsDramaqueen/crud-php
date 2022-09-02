<!--Page for  -->
<?php
  require_once 'config/connect.php'; //connect to DB
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Users Data</title>
  </head>
  <body>
  	<div>
		<center><h3>Data of users</h3></center>
	</div>

		<!-- Table with users data -->
    <div class="contanier" style="margin: 15px 105px; max-width: 100%; padding: 0 15px;">
      <div class="row">
        <div class="col-12">
        	<p>Вернуться на <a href="index.php">главную</a>.</p>
            <table class="table table-striped table-hover table-bordered mt-2">

            	<!-- Table header -->
              <thead class="thead-dark">
                <!-- <th>ID</th> -->
                <th><?php echo sort_link_th('Login', 'login_asc', 'login_desc'); ?></th>
                <th><?php echo sort_link_th('Password', 'password_asc', 'password_desc'); ?></th>
                <th><?php echo sort_link_th('First Name', 'firstName_asc', 'firstName_desc'); ?></th>
                <th><?php echo sort_link_th('Last Name', 'lastName_asc', 'lastName_desc'); ?></th>
                <th><?php echo sort_link_th('Gender', 'gender_asc', 'gender_desc'); ?></th>
                <th><?php echo sort_link_th('Date of Birth', 'dob_asc', 'dob_desc'); ?></th>
                <th><a href="create.php" class="btn btn-success" data-toggle="modal" data-target="#create"><i class="bi bi-plus-lg"></i></a></th>
              </thead>

              <?php

              	//for pagination
              	$page = isset($_GET['page']) ? $_GET['page']: 1;
              	$limit = 5;
              	$offset = $limit * ($page - 1);

              	//all views of sorting in table
                $sort_list = array(
									'login_asc'   => '`login`',
									'login_desc'  => '`login` DESC',
									'password_asc'  => '`password`',
									'password_desc' => '`password` DESC',
									'firstName_asc'   => '`firstName`',
									'firstName_desc'  => '`firstName` DESC',
									'lastName_asc'   => '`lastName`',
									'lastName_desc'  => '`lastName` DESC',
									'gender_asc'   => '`gender`',
									'gender_desc'  => '`gender` DESC',
									'dob_asc'  => '`dob`',
									'dob_desc' => '`dob` DESC',
								);

								$sort = @$_GET['sort'];
								if (array_key_exists($sort, $sort_list)) {
									$sort_sql = $sort_list[$sort];
								} else {
									$sort_sql = reset($sort_list);
								}

								//query to db
								$users = mysqli_query($link, query:"SELECT * FROM users ORDER BY {$sort_sql} LIMIT $limit OFFSET $offset");
				        $users = mysqli_fetch_all($users);

				        //function added links
				        function sort_link_th($title, $a, $b) {
									$sort = @$_GET['sort'];

									if ($sort == $a) {
										return '<a style="color: white" class="active" href="?sort=' . $b . '">' . $title . ' <i class="bi bi-arrow-up"></i></i></a>';
									} elseif ($sort == $b) {
										return '<a style="color: white" class="active" href="?sort=' . $a . '">' . $title . ' <i class="bi bi-arrow-down"></i></a>';
									} else {
										return '<a style="color: white" href="?sort=' . $a . '">' . $title . '</a>';
									}
								}

								//Table body
                foreach ($users as $user){
              ?>
                <thead>
                 <!--  <td><?= $user[0] ?></td> -->
                  <td><?= $user[1] ?></td>
                  <td><?= $user[2] ?></td>
                  <td><?= $user[3] ?></td>
                  <td><?= $user[4] ?></td>
                  <td><?= $user[5] ?></td>
                  <td><?= $user[6] ?></td>
                  <td><a href="?user<?= $user[0]?>" class="btn btn-secondary" data-toggle="modal" data-target="#user<?= $user[0] ?>"><i class="bi bi-eye-fill"></i></a>
                  <a href="update.php?id=<?= $user[0]?>" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                  <a href="vendor/delete.php?id=<?= $user[0]?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                </thead>

                <!-- Modal window for view information of user -->
              <div class="modal" id="user<?= $user[0] ?>" data-backdrop="static" data-keyboard="false">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header" >
							        <h5 class="modal-title">User <?= $user[1] ?></h5>
							        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
							        	<span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							        <form action="user-data.php" method="post">
							        	<div class="form-group">
							        		<p>Login: <?= $user[1] ?></p>
								 		</div>

								 		<div class="form-group">
								 			<p>Password: <?= $user[2] ?></p>

								 		</div>

								 		<div class="form-group">
								 			<p>First Name: <?= $user[3] ?></p>

								 		</div>

								 		<div class="form-group">
								 			<p>Last Name: <?= $user[4] ?> </p>
								 		</div>

								 		<div class="form-group">
								 			<p>Gender: <?= $user[5] ?></p>
								 		</div>

								 		<div class="form-group">
								 			<p>Date of Birth: <?= $user[6] ?></p>
									 		<br> <br>
									 	</div>

							      </div>
							      <div class="modal-footer">
							        <button class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal">Close</button>
							        </form>
							      </div>
							    </div>
							  </div>
							</div>

              <?php
                }
              ?>
            </table>

            	<?php
            	//pagination
            	$usrs = mysqli_query($link, query:"SELECT COUNT(*) FROM users");
              $row = mysqli_fetch_row($usrs);

              $total = $row[0];

              $str_page = ceil($total / $limit);

							?><center><?php
			                for ($i = 1; $i <= $str_page; $i++){ ?>

								<a href=user-data.php?page=<?= $i ?>>Page <?= $i ?></a>

			                <?php
			            	} ?>
			          </center>
        </div>
      </div>
    </div>

    <!-- Modal window for create a new row -->
    <div class="modal" id="create" tabindex="-1">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Add user</h5>
	        <button  class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
	        	<span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="vendor/create.php" method="post">
	        	<div class="form-group">
	        		<p>Login</p>
		 			<input type="text" size="30" class="form-control" name="login" required="required" placeholder="Login">
		 			<span class="error"></span>
		 		</div>

		 		<div class="form-group">
		 			<p>Password</p>
		 			<input type="text" class="form-control" name="password" required="required" placeholder="Password">
		 			<span class="error"></span>
		 		</div>

		 		<div class="form-group">
		 			<p>First Name</p>
		 			<input type="text" class="form-control" name="firstName" required="required" placeholder="First Name">
		 			<span class="error"> </span>
		 		</div>

		 		<div class="form-group">
		 			<p>Last Name</p>
		 			<input type="text" class="form-control" name="lastName" required="required" placeholder="Last Name">
		 			<span class="error"></span>
		 		</div>


		 		<div class="form-group">
		 			<p>Gender</p>
		 			<input type="radio"  name="gender" required="required" value="Male">
		 			<label for="genderChoice1">Male</label>

		 			<input type="radio" name="gender" value="Female">
		 			<label for="genderChoice2">Female</label>
		 			<span class="error"></span>
		 		</div>

		 		<div class="form-group">
		 			<p>Date of Birth</p>
			 		<input type="date" class="form-control" required="required" name="dob"><br> <br>
			 		<span class="error"></span>
			 	</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button"class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-success" name="add">Add user</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
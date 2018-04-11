<?php 
	$query = "SELECT * FROM users WHERE roles != 'user'";
	$result = $conn->query($query);

	if (isset($_GET['delete'])) {
								$id = (int)$_GET['delete'];
								$deleteQuery = "DELETE FROM users WHERE id = '$id'";
								//var_dump($deleteQuery);die;
								$conn->query($deleteQuery);

								echo 
								'	<div class="col-md-9">
										<div class="alert alert-success alert-dismissible" role="alert">
										 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										 	<strong>Success!</strong><a href="users.php"> User has been deleted. Return to users page</a>.
										</div>
									</div> ';
							}

			echo '<div class="col-md-9">
					<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="img/profile.png" width="100%" height="200px">';
?>
							
							<?php 

							if (isset($_GET['newuser'])) {

								if (postInputExists()) {
									if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
										$fullname = escape($_POST['fullname']);
										$email = escape($_POST['email']);
										$username = escape($_POST['username']);
										$role = escape($_POST['role']);
										$password = escape($_POST['password']);
										$confirmpassword = escape($_POST['confirm-password']);
										$errors = '';

										$requiredValidation = array('fullname', 'email', 'username', 'password', 
											'confirm-password');
										foreach ($requiredValidation as $required) {
											if ($_POST[$required] == '') {
												$errors[] = 'Please enter as fields marked with <b>*</b>. These fields are mandatory.';
												break;
											}
										}

										if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
											$errors[] = 'Please provide a valid email address';
										} elseif ($password != $confirmpassword) {
											$errors[] = "Your passwords dont seem to match. Please try again.";
										}

										$query = "SELECT * FROM users WHERE email = '$email'";
										$result = $conn->query($query);
										$count = $result->num_rows;

										if ($count > 0) {
											$errors[] = "That email address (".$email.") already exists, please try again";
										}
									}

									if (!empty($errors)) {
										echo errors($errors);
									} else {
										$password_hashed = password_hash($password, PASSWORD_DEFAULT);
										$date = date('Y-m-d H:i:s');
										if ($role == '') {
											$insert_query = "INSERT INTO users (username, password, name, email, joindate, roles) VALUES ('$username', '$password_hashed', '$fullname', '$email', '$date', 'employee')";
										} else {
											$insert_query = "INSERT INTO users (username, password, name, email, joindate, roles) VALUES ('$username', '$password_hashed', '$fullname', '$email', '$date', 'employee,$role')";
										}
										//var_dump($insert_query);die;
										$conn->query($insert_query);
										header("Location: login.php");
									}
								} 

								$token = $_SESSION['token'] = md5(uniqid());

								echo 
								'
								<div class="col-md-12 text-center">
									<form action="users.php?newuser=1" method="post">
										<div class="logo">
											<h2>Add new User</h2>
										</div>
										<div class="form-group" id="input">
											<label for="fullname">Fullname*: </label>
											<input type="text" class="form-control" name="fullname" id="fullname" autocomplete="off" placeholder="John Doe">
										</div>
										<div class="form-group" id="input">
											<label for="email">Email Address*: </label>
											<input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="johndoe@hotmail.co.uk">
										</div>
										<div class="form-group" id="input">
											<label for="username">Username*: </label>
											<input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username">
										</div>
										<div class="form-group">
							    			<label for="role">Select Role*</label>
							    			<select class="form-control" id="role" name="role">
							      				<option></option>
							      				<option>driver</option>
							      				<option>admin</option>
							    			</select>
							  			</div>
										<div class="form-group" id="input">
											<label for="password">Password*: </label>
											<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
										</div>
										<div class="form-group" id="input">
											<label for="confirm-password">Confirm Password*: </label>
											<input type="password" class="form-control" name="confirm-password" id="confirm-password" autocomplete="off" placeholder="Confirm Password">
										</div>
										<input type="hidden" name="token" value="'.$token.'">
										<a href="users.php" class="btn btn-danger btn-block">Cancel</a>
										<input type="submit" value="Add New User" class="btn btn-success btn-block">
									</form>
								</div>
								';

							} else {
								echo 
								'
								<div class="col-md-12 text-center">
								<br>
									<a href="users.php?newuser=1" class="btn btn-danger btn-block">New User</a>
								</div>
								';
							}
							?>
						</div>
					</div>
				</div>
				<?php while ($user = $result->fetch_assoc()) : ?>
		<?php 
			$roles = $user['roles']; 
			$rolesSplit = explode(',', $roles);
		?>
	<div class="col-xs-12 col-sm-4 col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<!-- <img src="img/profile.png" width="100%" height="200px" class="img-circle"> -->
				<div class="col-md-12 text-center">
					<h4><?= $user['name']; ?></h4>
					<h5><?= $user['email']; ?></h5>
					<hr>
					<h5>
						<?php 

						echo '<div class="table">
									<table class="table table-bordered">
										<th class="text-center"></th>
										<th class="text-center">Employee Roles</th>
										<th class="text-center"></th>
							';
							foreach ($rolesSplit as $role) {
								echo '
										<tr>
											<td></td>
											<td>'.ucfirst($role).'</td>
											<td></td>
										</tr>';
							}
									echo '</table>
								</div>
							    ';
						?>
					</h5>
					<hr>
					<a href="tel:07746413009" class="btn btn-default btn-success glyphicon glyphicon-phone"></a>
					<a href="users.php?edit=<?=$user['id'];?>" class="btn btn-default btn-primary glyphicon glyphicon-pencil"></a>
					<a href="users.php?delete=<?=$user['id'];?>" class="btn btn-default btn-danger glyphicon glyphicon-trash"></a>
					<!-- <a href="#" class="btn btn-default btn-danger"><i class="fa fa-envelope" style="font-size: 20px;color: #fff;"></i></a> -->
					<!-- <div class="col-xs-4 col-md-4">
						<i class="fa fa-facebook-square" style="font-size: 40px;"></i>
					</div>
					<div class="col-xs-4 col-md-4">
						<i class="fa fa-twitter-square" style="font-size: 40px;"></i>
					</div>
					<div class="col-xs-4 col-md-4">
						<i class="fa fa-youtube-square" style="font-size: 40px;"></i>
					</div> -->
					<!-- <div class="table">
						<table class="table">
							<th></th>
							<th class="text-center">Roles</th>
							<th></th>
							<tr>
								<td>+</td>
								<td><?= $user['roles']; ?></td>
								<td>-</td>
							</tr>
						</table>
					</div> -->
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
	
	

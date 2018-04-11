	<?php 
		include 'includes/overall/m_header.php';
		require_once 'core/init.php';

		//$path = $_POST['path'];

		if (postInputExists()) {
			if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
				$fullname = escape($_POST['fullname']);
				$email = escape($_POST['email']);
				$username = escape($_POST['username']);
				$password = escape($_POST['password']);
				$confirmpassword = escape($_POST['confirm-password']);
				$errors = '';

				$validation = array('username', 'password', 'fullname', 'email');
				foreach ($validation as $validate) {
					if ($_POST[$validate] == '') {
						$errors[] = 'All fields must be supplied';
						break;
					}
				}

				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$errors[] = 'Please provide a valid email address';
				} elseif ($password != $confirmpassword) {
					$errors[] = "Your passwords dont seem to match. Please try again.";
				}

				$query = "SELECT * FROM users WHERE username = '$username'";
				$result = $conn->query($query);
				$count = $result->num_rows;

				if ($count > 0) {
					$errors[] = "That username already exists, please try again";
				}
			} else {
				$errors[] = 'Something went wrong, Please try again';
			}

			if (!empty($errors)) {
				echo errors($errors);
			} else {
				$password_hashed = password_hash($password, PASSWORD_DEFAULT);
				$date = date('Y-m-d H:i:s');
				$insert_query = "INSERT INTO users (username, password, name, email, joindate, roles) VALUES ('$username', '$password_hashed', '$fullname', '$email', '$date', 'user')";
				$conn->query($insert_query);
				header("Location: login.php");
			}
		}

		$token = $_SESSION['token'] = md5(uniqid());
	?>

	<section id="register">
		<div class="container">
			<div class="row">
				<h1>Register here</h1>
				<?=$token;?>
				<div class="col-md-6">
					<div class="home">
						<div class="item">
							<div class="content">
								<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
									<div class="logo">
										<h2>Sign in</h2>
									</div>
									<div class="form-group" id="input">
										<label for="fullname">Fullname: </label>
										<input type="text" class="form-control" name="fullname" id="fullname" autocomplete="off" placeholder="John Doe">
									</div>
									<div class="form-group" id="input">
										<label for="email">Email Address: </label>
										<input type="text" class="form-control" name="email" id="email" autocomplete="off" placeholder="johndoe@hotmail.co.uk">
									</div>
									<div class="form-group" id="input">
										<label for="username">Username: </label>
										<input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username">
									</div>
									<div class="form-group" id="input">
										<label for="password">Password: </label>
										<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
									</div>
									<div class="form-group" id="input">
										<label for="confirm-password">Confirm Password: </label>
										<input type="password" class="form-control" name="confirm-password" id="confirm-password" autocomplete="off" placeholder="Confirm Password">
									</div>
										<input type="hidden" name="token" value="<?= $token; ?>">
										<input type="submit" value="Register now" class="btn btn-primary btn-block">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>

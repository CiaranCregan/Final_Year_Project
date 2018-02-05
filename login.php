	<?php 
		include 'includes/overall/m_header.php';
		require_once 'core/init.php';

		//$path = $_POST['path'];

		if (postInputExists()) {
			if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
				$username = escape($_POST['username']);
				$password = escape($_POST['password']);
				$errors = '';

				$validation = array('username', 'password');
				foreach ($validation as $validate) {
					if ($_POST[$validate] == '') {
						$errors[] = 'All fields must be supplied';
						break;
					}
				}

				$user_sql = "SELECT * FROM users WHERE username = '$username'";
				$result = $conn->query($user_sql);
				$user = $result->fetch_assoc();
				$count = $result->num_rows;

				if ($count < 1) {
				 	$errors[] = $username . ' doesnt seem match. Please try again.';
				 } else {
				 	if (!password_verify($password, $user['password'])) {	
						$errors[] = 'That password and username combination doesnt seem match. Please try again.';
					}
				 }
			}

			if (!empty($errors)) {
				echo errors($errors);
			} else {

				$user_id = $user['id'];
				login($user_id);
			}
		}

		$token = $_SESSION['token'] = md5(uniqid());
	?>

	<section id="login">
		<div class="container">
			<div class="row">
				<h1>Please login</h1>
				<h4>Sign in now to view your latest orders and have the ability to track them while on the go. We try our best to provide you with the best needs to make your shopping easier and more convient.</h4>
				<div class="col-md-6">
					<div class="home">
						<div class="item">
							<div class="content">
								<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
									<div class="logo">
										<h2>Sign in</h2>
									</div>
									<div class="input-group" id="input">
										<span class="input-group-addon"><i class="">Username</i></span>
										<input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Username">
									</div>
									<div class="input-group" id="input">
										<span class="input-group-addon"><i class="">Password</i></span>
										<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password">
									</div>
									<div class="form-group" id="input-button">
									<input type="hidden" name="token" value="<?= $token; ?>">
									<input type="submit" value="Login" class="btn btn-primary btn-block"><br><br>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>

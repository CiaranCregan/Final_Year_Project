<?php
	$user_query = "SELECT * FROM users WHERE roles != 'user'";
	$result = $conn->query($user_query);
?>
<section id="sidebar">
		<div class="container-fluid">
			<div class="row">
			<!-- Dashboard side menu -->
			<?php include 'includes/admin/b_nav.php' ;?>
			<div class="col-sm-12 col-md-9">
				<div class="col-sm-4 col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-folder-open"></i></h1>
						<h3>65</h3>
						<a href="orders.php" class="btn btn-default">View Orders</a>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-user"></i></h1>
						<h3>12</h3>
						<a href="users.php" class="btn btn-default">View Users</a>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-tasks"></i></h1>
						<h3>6</h3>
						<a href="#" class="btn btn-default">View Tasks</a>
					</div>
				</div>
				<div class="col-md-12">
					<div class="panel-body">
						<img src="https://www.enginepublishing.com/files/lifetime-graph.jpg" width="100%" height="400px">
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
			<!-- End of Dashboard Side Menu -->	
		</section>
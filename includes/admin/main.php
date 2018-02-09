<?php
	$user_query = "SELECT * FROM users WHERE roles != 'user'";
	$result = $conn->query($user_query);
?>
<section id="sidebar">
		<div class="container-fluid">
			<div class="row">
			<!-- Dashboard side menu -->
			<div class="col-md-3">
				<div class="col-md-12">
					<div class="list-group">
					  <a href="brands.php" class="list-group-item"><h4><i class="fa fa-folder-open"></i> Dashboard</h4></a>
					  <a href="brands.php" class="list-group-item"><h4>Brands</h4></a>
					  <a href="brands.php" class="list-group-item"><h4>Products</h4></a>
					  <a href="brands.php" class="list-group-item"><h4>Users</h4></a>
					  <a href="brands.php" class="list-group-item"><h4>Orders</h4></a>
					  <a href="brands.php" class="list-group-item"><h4>Tasks</h4></a>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-folder-open"></i></h1>
						<h3>65</h3>
						<h4>New Orders</h4>
					</div>
				</div>
				<div class="col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-user"></i></h1>
						<h3>12</h3>
						<h4>New Users</h4>
					</div>
				</div>
				<div class="col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-tasks"></i></h1>
						<h3>6</h3>
						<h4>New Tasks</h4>
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
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
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-folder-open"></i></h1>
						<h3>Total New Orders: <br><?=newOrders();?></h3>
						<a href="orders.php" class="btn btn-default">View New Orders</a>
						<p>(Order Amount: <?=totalAmountOfOrders();?>)</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-credit-card"></i></h1>
						<h3>Todays Amount: £<?=totalSpendToday();?></h3>
						<a href="users.php" class="btn btn-default">View Revenue</a>
						<p>(Order Amount: £<?=totalSpendAmount();?>)</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
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
<?php
	$user_query = "SELECT * FROM users WHERE roles != 'user'";
	$result = $conn->query($user_query);

	$difference = totalSpendToday() - totalSpendYesterday();

	$total = round(($difference / totalSpendYesterday())*100, 2);

	$overall = overall();
	$success = purchased();
	$failed = failed();
	$success_per = round(($success / $overall)*100);
	$failed_per = round(($failed / $overall)*100);
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
						<h3>New Orders: <br><?=newOrders();?></h3>
						<a href="orders.php" class="btn btn-default">View New Orders</a>
						<p>(Order Amount: <?=totalAmountOfOrders();?>)</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="well text-center">
						<h1><i class="fa fa-credit-card"></i></h1>
						<h3>Todays Amount: <br> £<?=totalSpendToday();?> (<small style="color:<?=(($total > 0)?'green':'red');?>"><?=(($total > 0)?'<i class="fa fa-sort-up" style="color:green"></i> '.$total.'%':'<i class="fa fa-sort-down" style="color:red"></i> '.$total.'%');?></small>)</h3>
						<a href="users.php" class="btn btn-default">View Revenue</a>
						<p>(Order Amount: £<?=totalSpendAmount();?>)</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class=" well text-center">
						<h4 class="text-center">Payments</h4>
						<h5><b>Successful Payments</b> <small>(<?=$success;?> / <?=$overall;?>)</small></h5>
						<div class="progress">
						  <div class="progress-bar progress-bar-success" style="width: <?=$success_per;?>%">
						    <?=$success_per;?>%
						  </div>
						</div>
						<h5><b>Failed Payments</b> <small>(<?=$failed;?> / <?=$overall;?>)</small></h5>
						<div class="progress">
						  <div class="progress-bar progress-bar-danger" style="width: <?=$failed_per;?>%">
						    <?=$failed_per;?>% Purchased
						  </div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well">
						<h4>Stats <div class="pull-right"><i class="fa fa-signal"></i></div></h4>
						<hr>
						<canvas id="myChart"></canvas>
					</div>
				</div>
				<div class="col-md-6">
					<div class="well">
						
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
			<!-- End of Dashboard Side Menu -->	
		</section>
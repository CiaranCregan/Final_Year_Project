<?php 
    require_once 'core/init.php';
    if (!loggedin()) {
	error_redirect('login.php');
	}
    include 'includes/overall/m_header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-12" style="padding-top: 20px;">
			<h3 class="text-center">My Account</h3>
			<hr>
			<label><a href="#"><h5> > Account Details</h5></a></label><br>
			<label><a href="#"><h5> > Orders</h5></a></label><br>
			<hr>
			<label><a href="index.php"><h5> > Continue Shopping</h5></a></label><br>
			<a href="logout.php" class="btn btn-default">Sign Out</a>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-12" style="padding-top: 20px;">
			<div class="row">
				<h3 class="text-center"><b>Welcome, <?= $name;?></b></h3><br>
				<img src="http://www.shop4pop.com/wp-content/uploads/2015/06/sale1.jpg" style="width: 100%; height: 200px;"><br><br>
				<div class="col-md-6">
					<div class="well text-center">
					    <h2 id="size-h2"><span class="glyphicon glyphicon-user"></span></h2>
					    <h4><a href="#">Account Details</a></h4>
					</div>
			    </div>
			    <div class="col-md-6">
					<div class="well text-center">
					    <h2 id="size-h2"><span class="glyphicon glyphicon-list"></span></h2>
					    <h4><a href="#">Orders</a></h4>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
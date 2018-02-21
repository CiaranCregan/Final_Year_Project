<?php 
	$query = "SELECT * FROM users WHERE roles != 'user'";
	$result = $conn->query($query);
?>
<div class="col-md-9">
	<div class="col-xs-12 col-sm-4 col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<img src="img/profile.png" width="100%" height="200px">
				<div class="col-md-12 text-center">
					<a href="#" class="btn btn-danger">New User</a>
				</div>
			</div>
		</div>
	</div>
	<?php while ($user = $result->fetch_assoc()) : ?>
	<div class="col-xs-12 col-sm-4 col-md-4">
		<div class="panel panel-default">
			<div class="panel-body">
				<img src="img/alexandra-gorn.jpg" width="100%" height="200px" class="img-circle">
				<div class="col-md-12 text-center">
					<h4><?= $user['name']; ?></h4>
					<a href="#" class="btn btn-default btn-block btn-success"><i class="fa fa-phone" style="font-size: 20px;color: #fff;"></i></a>
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

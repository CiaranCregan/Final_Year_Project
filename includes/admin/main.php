<?php
	$user_query = "SELECT * FROM users WHERE roles != 'user'";
	$result = $conn->query($user_query);
?>
<section id="main">
		<div class="container-fluid">
			<div class="row">
			<!-- Dashboard side menu -->
				<div class="col-md-3">
					<div class="list-group">
					  <a href="#" id="m-color" class="list-group-item active">
					    Dashboard
					  </a>
					  <a href="brands.php" class="list-group-item"><span class="glyphicon glyphicon-asterisk"></span> Brands</a>
					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-asterisk"></span> Link</a>
					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-asterisk"></span> Link</a>
					  <a href="#" class="list-group-item"><span class="glyphicon glyphicon-asterisk"></span> Link</a>
					</div>
				</div>
			<!-- End of Dashboard Side Menu -->	
			
			<!-- Website Overview (main) -->		
				<div class="col-md-9">
					<div class="panel panel-default">
					  <div id="m-color" class="panel-heading">
					    <h3 class="panel-title">Website Overview</h3>
					  </div>
					  <div class="panel-body">
					    <div class="col-md-3">
					    	<div class="well text-center">
					    		<h2 id="size-h2"><span class="glyphicon glyphicon-folder-open"></span></h2>
					    		<h4>Products</h4>
					    	</div>
					    </div>
					    <div class="col-md-3 text-center">
					    	<div class="well">
					    		<h2 id="size-h2"><span class="glyphicon glyphicon-asterisk"></span> Catorgies</h2>
					    	</div>
					    </div>
					    <div class="col-md-3 text-center">
					    	<div class="well">
					    		<h2 id="size-h2"><span class="glyphicon glyphicon-bed"></span> </h2>
					    		<h4>Brands</h4>
					    	</div>
					    </div>
					    <div class="col-md-3 text-center">
					    	<div class="well">
					    		<h2 id="size-h2"><span class="glyphicon glyphicon-user"></span> </h2>
					    		<h4>Users</h4>
					    	</div>
					    </div>
					   </div>
					</div>
			<!-- End of Website Overview (main) -->

			<!-- Website Users (main) -->		
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title">Website Users</h3>
						</div>
						<div class="panel-body table-responsive">
							<table class="table table-bordered table-striped">
							  <thead>
							    <th>Username</th>
							    <th>Fullname</th> 
							    <th>Date Joined</th>
							    <th>User Role(s)</th>
							  </thead>
							  <tbody>
							  	<?php
							  	while ($user = $result->fetch_assoc()) : ?>
							  	<tr>
							  		<td><?=$user['username'];?></td>
							  		<td><?=$user['name'];?></td>
							  		<td><?=$user['joindate'];?></td>
							  		<td><?=$user['roles'];?></td>
							  	</tr>
							  	<?php endwhile; ?>
							  </tbody>
							</table>
							<a href="users.php" id="main-users-margin" class="btn btn-default pull-right">Visit the Users Page</a>
						</div>
					</div>
			<!-- End of Website Users (main) -->

			<!-- Add Content (main) -->
					<div class="panel panel-default">
						  <div id="m-color" class="panel-heading">
						    <h3 class="panel-title">Add content</h3>
						  </div>
						  <div class="panel-body">
						    <div class="col-md-12">
						    	<textarea name="editor1"></textarea>
						    </div>
						</div>
					</div>
			<!-- End of Add Content (main) -->
			</div>
		</div>
	</section>
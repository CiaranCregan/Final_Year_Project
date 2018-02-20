<?php 
	$query = "SELECT * FROM payments WHERE viewed = 1";
	$result = $conn->query($query);
?>

	
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Orders for Delivery</div>
				<div class="panel-body">
					<a href="orders.php" class="btn btn-success" style="margin-bottom: 10px;">View Orders</a>
					<div class="table-responsive">
						<table class="table table-hover">
						  <th>Order No.</th>
						  <th>Order Date</th>
						  <th>Customer Name</th>
						  <th>Email</th>
						  <th>Address</th>
						  <th>Description</th>
						  <th>Total (£)</th>
						  <th></th>
						  <?php while ($order = $result->fetch_assoc()) : ?>
						  <tr class="success">
						  	<td><?= $order['id']; ?></td>
						  	<td><?= $order['payment_date']; ?></td>
						  	<td><?= $order['user_name']; ?></td>
						  	<td><?= $order['email']; ?></td>
						  	<td>
						  		<address>
									<?= $order['address'] ;?><br> 
									<?= $order['postcode'] ;?><br>
									<?= $order['county'] ;?><br>
								</address>
							</td>
						  	<td><?= $order['description']; ?></td>
						  	<td>£<?= $order['total']; ?></td>
						  	<td><a href="#" class="btn btn-default">Add to delivery </a></td>
						  </tr>
						  <?php endwhile; ?>
						</table>
					</div>
				</div>
			</div>
		</div>



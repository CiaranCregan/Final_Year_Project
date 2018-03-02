<?php 
	$query = "SELECT * FROM payments WHERE viewed = 0 ORDER BY id DESC";
	$result = $conn->query($query);
?>

	
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">Orders</div>
				<div class="panel-body">
					<a href="porders.php" class="btn btn-success" style="margin-bottom: 10px;">Viewed Orders</a>
					<div class="table-responsive">
						<table class="table table-hover">
						  <th>Order No.</th>
						  <th>Cart No.</th>
						  <th>Order Date</th>
						  <th>Customer Name</th>
						  <th>Email</th>
						  <th>Address</th>
						  <th>Description</th>
						  <th>Total (£)</th>
						  <th></th>
						  <?php while ($order = $result->fetch_assoc()) : ?>
						  <tr>
						  	<td><?= $order['id']; ?></td>
						  	<td><?= $order['cart_id']; ?></td>
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
						  	<td><button type="button" class="btn btn-default" onclick="orderdetails(<?= $order['cart_id']; ?>)">View Products</button></td>
						  </tr>
						  <?php endwhile; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function orderdetails(id){ // id = id of product
    		// alert("Cart ID: " + id)
    		var orderData = {"id" : id};
    		$.ajax({
    			url 	: 'includes/orderdetails.php',
    			method 	: "post",
    			data 	: orderData,
    			success	: function(orderData){
    				jQuery("body").append(orderData);
    				jQuery("#order").modal('toggle');
    			},
    			error	: function(){
    				alert("Problem occurred");
    			}
    		});
    	}
		</script>

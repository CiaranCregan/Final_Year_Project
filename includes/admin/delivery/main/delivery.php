<?php 
	$Today=date('y:m:d');
	$query = "SELECT * FROM payments WHERE status = 1 AND delivery_date = '$Today'";
	$result = $conn->query($query);
	$deliveryDate = date('y:m:d', strtotime("+3 days"));

	if (isset($_GET['complete'])) {
		$id = (int)$_GET['complete'];

		$conn->query("UPDATE payments SET status = 2 WHERE id = '$id'");
		$conn->query("UPDATE payments SET delivered = 1 WHERE id = '$id'");

		header("Location: delivery.php");

	}
?>

	
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">Todays Deliveries</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover">
						  <th>Address</th>
						  <th>Description</th>
						  <th></th>
						  <?php while ($order = $result->fetch_assoc()) : ?>
						  <tr class="">
						  	<td>
						  		<address>
									<?= $order['address'] ;?><br> 
									<?= $order['postcode'] ;?><br>
									<?= $order['county'] ;?><br>
								</address>
							</td>
						  	<td><?= $order['description']; ?></td>
						  	<td><button type="button" class="btn btn-default" onclick="orderdetails(<?= $order['cart_id']; ?>)">View Products</button><br><br><a href="delivery.php?complete=<?=$order['id'];?>" class="btn btn-default btn-success">Confirm Delivery</a></td>
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

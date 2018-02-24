<?php 
    require_once 'core/init.php';
    if (!loggedin()) {
	error_redirect('login.php');
	}
    include 'includes/overall/m_header.php';

    $query = "SELECT * FROM payments WHERE user_id = '$user_id' ORDER BY payment_date DESC";
    $result = $conn->query($query);
?>

<div class="container">
	<section id="history">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4 class="text-center">My Recent Orders</h4></div>
				<div class="panel-body">
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
						  	<td><button type="button" class="btn btn-success" onclick="orderdetails(<?= $order['cart_id']; ?>)">View Products</button></td>
						  </tr>
						  <?php endwhile; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function orderdetails(id){ // id = id of product
    		// alert("Cart ID: " + id)
    		var orderData = {"id" : id};
    		$.ajax({
    			url 	: 'includes/orderhistory.php',
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
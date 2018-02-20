<?php 
    require_once 'core/init.php';
    if (!loggedin()) {
	error_redirect('login.php');
	}
    include 'includes/overall/m_header.php';

    $query = "SELECT * FROM payments WHERE user_id = '$user_id' ORDER BY payment_date DESC";
    $result = $conn->query($query);

    $query2 = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
    $result2 = $conn->query($query2);
    // var_dump($shopping_items);die();
?>

<h3 class="text-center">My Recent Orders</h3>
<div class="container">
	<section id="history">
		<div class="col-md-12">
		<div class="row">
			<?php while ($info = $result->fetch_assoc()) : ?>
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Order Number: <?= $info['id'] ;?> | Description: <?= $info['description'] ;?></h4></div>
		            <div class="panel-body">
		              	<div class="col-md-6">
		              		<div class="well">
		              			<h4>Billing Address: </h4>
		              			<p>Name: <b><?= $info['user_name'] ;?></b></p>
		              			<p>Address: <b><?= $info['address'] ;?></b></p>
		              			<p>County: <b><?= $info['county'] ;?></b></p>
		              		</div>
		              	</div>
		              	<div class="col-md-6">
		              		<div class="well">
		              			<h4>Purchased Items: </h4>
		              			<div class="table-responsive">
			              			<table class="table">
			              				<?php 

			              				while ($shopping_items = $result2->fetch_assoc()) {
			              					$items = json_decode($shopping_items['items'], true);
			              					foreach ($items as $item) {
								              $id = $item['id'];
								              $product = "SELECT * FROM products WHERE id = '$id'";
								              // var_dump($id);die();
								              $result3 = $conn->query($product);
								              $product_info = $result3->fetch_assoc();
					              			?>
			              				<tr>
			              					<td style="width: 200px;">Product Image: <img src="<?= $product_info['image'];?>" class='img-thumbnail'"></td>
			              					<td>Quantity Order: <br><?= $item['quantity'];?> items(s) order</td>
			              					<td>Order Price: <br>£<?= $product_info['our_price'];?></td>
			              				</tr>
			              				<?php }
			              				} ?>
			              			</table>
			              		</div>
		              		</div>
		              	</div>
		            </div>
	      		</div>
			<?php endwhile; ?>
		</div>
	</div>
	</section>
</div>
<?php 
    require_once 'core/init.php';
    include 'includes/overall/m_header.php';

    $query = "SELECT * FROM payments WHERE user_id = '$user_id'";
    $result = $conn->query($query);
    $info = $result->fetch_assoc();
    // var_dump($info);die();

    $query2 = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
    $result2 = $conn->query($query2);
    $shopping_items = $result2->fetch_assoc();
    $items = json_decode($shopping_items['items'], true);
?>

<h2 class="text-center">My Recent Orders</h2>
<div class="container">
	<section id="history">
		<div class="col-md-12">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Order Number: <?= $info['id'] ;?> | Description: <?= $info['description'] ;?></h3></div>
	            <div class="panel-body">
	              	<div class="col-md-6">
	              		<div class="well">
	              			<h3>Billing Address: </h3>
	              			<p>Name: <b><?= $name ;?></b></p>
	              			<p>Address: <b><?= $info['address'] ;?></b></p>
	              			<p>County: <b><?= $info['county'] ;?></b></p>
	              		</div>
	              	</div>
	              	<div class="col-md-6">
	              		<div class="well">
	              			<h3>Purchased Items: </h3>
	              			<div class="table-responsive">
		              			<?php 
		              			foreach ($items as $item) {
					              $id = $item['id'];
					              $product = "SELECT * FROM products WHERE id = '$id'";
					              $result3 = $conn->query($product);
					              $product_info = $result3->fetch_assoc();
					            }
		              			?>
		              			<table class="table">
		              				<tr>
		              					<td style="width: 200px;">Product Image: <img src="<?= $product_info['image'];?>" class='img-thumbnail'"></td>
		              					<td>Quantity Order: <br><?= $item['quantity'];?> items(s) order</td>
		              					<td>Order Price: <br>£<?= $info['total'];?></td>
		              				</tr>
		              			</table>
		              		</div>
	              		</div>
	              	</div>
	            </div>
      		</div>
		</div>
	</div>
	</section>
</div>
<?php 
	
	include '../core/init.php';

	// id coming from the product in best seller section
	$order_id = $_POST['id'];
	$order_id = (int)$order_id;

	// // creating the product info by using the id from the best seller section and then assigning it to $products_info 
	$query = "SELECT * FROM shopping_cart WHERE id = '$order_id'";
	$result = $conn->query($query);
	$orderInfo = $result->fetch_assoc();
	$orderItems = json_decode($orderInfo['items'], true);

	// $conn->query("UPDATE payments SET viewed = 1 WHERE cart_id = '$order_id'");

	// // creating the brand info by using the id from within the products table 
	// $brand_id = $products_info['brand'];
	// $brand_sql = "SELECT brand_name FROM brands WHERE id = '$brand_id'";
	// $brand_query_result = $conn->query($brand_sql);
	// $brand_id_info = $brand_query_result->fetch_assoc();
?>
<!-- MODAL BOX START -->
<?php ob_start(); ?>
<div class="modal fade details1" id="order" tabindex="-1" role="dialog" aria-labelledby="order1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button class="close" type="button" aria-label="close" onclick="modalClose()">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title text-center">Cart Number: <?= $orderInfo['id'];?></h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<span id="errors" class="bg-danger"></span>
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table">
					            <?php
					            	foreach ($orderItems as $order) {
										$id = $order['id'];
						              	$orderQuery = "SELECT * FROM products WHERE id = '$id'";
						              	$result = $conn->query($orderQuery);
						              	$orders = $result->fetch_assoc();
					            ?>
					            <tr>
					              <td><img src="<?= $orders['image'];?>" style="width:200px;height:200px;"></td>
					              <td><h4>Product Name:</h4> <br><?= $orders['title'];?></td>
					              <td><h4>Size:</h4> <br><?= $orders['size'];?></td>
					              <td><h4>Quantity:</h4> <br><?= $order['quantity'];?></td>
					              <td><h4>Storage:</h4> <br><?= (($orders['storage'] == 0)?'None':$order['side'] . ' x2');?></td>
					              <td><h4>Colour:</h4> <br><?= $order['color'];?></td>
					              <td><h4>Price:</h4> <br>£<?= $orders['our_price'];?>.00</td>
					            </tr>
					            <?php } ?>
					        </table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" onclick="modalClose()">Close</button>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	// funcitpn responsible for removing html data from best seller section and closing the modal
	function modalClose(){
		jQuery('#order').modal('hide');
		setTimeout(function(){
			jQuery('#order').remove();
		},500);
	}
</script>
<?php echo ob_get_clean(); ?>
<!-- MODAL BOX END -->
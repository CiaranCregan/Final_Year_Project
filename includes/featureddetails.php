<?php 
	
	include '../core/init.php';

	// id coming from the product in best seller section
	$feat_id = $_POST['id'];
	$feat_id = (int)$feat_id;

	// creating the product info by using the id from the best seller section and then assigning it to $products_info 
	$product_sql = "SELECT * FROM products WHERE id = '$feat_id'";
	$product_query_result = $conn->query($product_sql);
	$products_info = $product_query_result->fetch_assoc();

	// creating the brand info by using the id from within the products table 
	$brand_id = $products_info['brand'];
	$brand_sql = "SELECT brand_name FROM brands WHERE id = '$brand_id'";
	$brand_query_result = $conn->query($brand_sql);
	$brand_id_info = $brand_query_result->fetch_assoc();
?>
<!-- MODAL BOX START -->
<?php ob_start(); ?>
<div class="modal fade details1" id="details" tabindex="-1" role="dialog" aria-labelledby="details1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button class="close" type="button" aria-label="close" onclick="modalClose()">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title text-center"><?= $products_info['title']; ?></h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<span id="errors" class="bg-danger"></span>
					<div class="col-md-6">
						<div class="center-block">
							<img src="<?= $products_info['image']; ?>" align="<?= $products_info['title']; ?>" style="width:700px;" class="img-responsive">
						</div>
					</div>
					<div class="col-md-6">
						<h4>Descripton</h4>
						<p><?= html_entity_decode($products_info['description']); ?></p>
						<hr>
						<p><?= $brand_id_info['brand_name']; ?></p>
						<form action="added_to_cart.php" method="post" id="add_to_cart">
							<input type="hidden" name="id" value="<?= $products_info['id'] ;?>">
						  <div class="form-group">
						    <label for="quantity">Select Quantity</label>
						    <select class="form-control" id="quantity" name="quantity">
						      <option></option>
						      <option>1</option>
						      <option>2</option>
						      <option>3</option>
						      <option>4</option>
						      <option>5</option>
						    </select>
						  </div>
						  <?php 
						  	if ($products_info['storage'] == 1) {
						  		echo '
						  			<div class="form-group">
						    			<label for="side">Select Drawer Side</label>
						    			<select class="form-control" id="side" name="side">
						      				<option></option>
						      				<option>Left</option>
						      				<option>Right</option>
						    			</select>
						  			</div>
						  			';
						  	}
						  ?>
						  <?php 
						  	if ($products_info['type'] == 'Bed') {
						  		echo '
						  			<div class="form-group">
									  	<label for="color">Base Colour</label>
									  	<select class="form-control" id="color" name="color">
									      <option></option>
									      <option>Black</option>
										  <option>Grey</option>
										  <option>Purple</option>
										  <option>Red</option>
										</select>
									<div>
						  			';
						  	}
						  ?>
							<h4>Our Price: £<?= $products_info['our_price']; ?></h4>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-warnign" onclick="modalClose()">Close</button>
			<button  onclick="save_to_cart();return false;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript">
	// funcitpn responsible for removing html data from best seller section and closing the modal
	function modalClose(){
		jQuery('#details').modal('hide');
		setTimeout(function(){
			jQuery('#details').remove();
		},500);
	}
</script>
<?php echo ob_get_clean(); ?>
<!-- MODAL BOX END -->
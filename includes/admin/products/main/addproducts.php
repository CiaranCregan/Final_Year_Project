				<?php 

				// amount of deleted products within the db
				$sql = "SELECT COUNT(*) AS count FROM products WHERE archived = 1";
				$query = $conn->query($sql);
				$row = $query->fetch_assoc();

				if (isset($_GET['addproduct'])) { 
					$sql1 = "SELECT * FROM brands WHERE archived = 0 ORDER BY brand_name";
					$query = $conn->query($sql1);

					if (postInputExists()) {
						if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION{'token'}) {
							$producterrors = '';
							$title = escape($_POST['title']);
							$brand = escape($_POST['brand']);
							$editor1 = escape($_POST['editor1']);
							$price = escape($_POST['price']);
							$ourprice = escape($_POST['ourprice']);

							$required = array('title','price','ourprice','brand','editor1');
							foreach ($required as $require) {
								if ($_POST[$require] == '') {
									$producterrors[] .= 'All fields marked with * must been filled.';
									break;
								}
							}
						}
						if (!empty($producterrors)) {
							echo product_errors($producterrors);
						} else {
							$sql2 = "INSERT INTO products (title, price, our_price, brand, description) VALUES ('$title', '$price', '$ourprice', '$brand', '$editor1')";
							$query2 = $conn->query($sql2);
							echo 
							'	
								<div class="col-md-12">
									<div class="alert alert-success alert-dismissible" role="alert">
									 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									 	<strong>Success!</strong><a href="products.php"> View</a>.
									</div>
								</div> 
							';
						}
					}

					$token = $_SESSION['token'] = md5(uniqid())
				?>
					<div class="col-md-9">
						<div class="panel panel-default">
							<div id="m-color" class="panel-heading">
							   <h3 class="panel-title">Add New Product</h3>
							</div>
							<div class="panel-body table-responsive">
								<form action="products.php?addproduct=true" method="post" enctype="multipart/form-data">
								  <div class="form-group col-md-4">
									  <label for="title">Product Title*:</label>
									  <input class="form-control" type="text" name="title" id="title">
								  </div>
								  <div class="form-group col-md-4">
									  <label for="price">Price*:</label>
									  <input class="form-control" type="text" name="price" id="price">
								  </div>
								  <div class="form-group col-md-4">
									  <label for="ourprice">Our Price*:</label>
									  <input class="form-control" type="text" name="ourprice" id="ourprice">
								  </div>
								  <div class="form-group col-md-4">
									  <label for="brand">Brand*:</label>
									  <select class="form-control" name="brand" id="brand">
									  	<option value=""></option>
									  	<?php while($row = $query->fetch_assoc()): ?>
									  		<option value="<?= $row['id']; ?>"><?= $row['brand_name']; ?></option>
									  	<?php endwhile; ?>
									  </select>
								  </div>
								  <!-- <div class="form-group col-md-8">
									  <label for="image">Product Image:</label>
									  <input class="form-control" type="file" name="image" id="image">
								  </div> -->
								  <div class="form-group col-md-12">
									  <label for="editor1">Product Description*:</label>
									  <textarea id="description" name="editor1" class="form-control" rows="8"></textarea>
								  </div>
								  <div class="form-group col-md-12">
									  <a href="products.php" class="btn btn-danger col-md-2">Cancel</a>
									  <input type="hidden" name="token" value="<?= $token; ?>">
									  <input type="submit" class="btn btn-success col-md-2 pull-right" value="Add Product">
								  </div>
								</form>
							</div>
						</div>
					</div>
				<?php } else {

				// grabs all products from within the products table
				$sql3 = "SELECT * FROM products WHERE archived = 0 ORDER BY title";
				$query3 = $conn->query($sql3);

					if (isset($_GET['featured'])) {
						// checks if the get has been set

						//grab featured from fetured get varible, will = 1 or 0;
						$featured = (int)$_GET['featured'];
						//grab id from ID get variable
						$id = (int)$_GET['id'];

						// $featured = 1 or 0 depending on whether or not the class = success or danger;
						$sql4 = "UPDATE products SET featured = '$featured' WHERE id = '$id'"; 
						$conn->query($sql4);

						echo 
						'	<div class="col-md-12">
								<div class="alert alert-success alert-dismissible" role="alert">
								 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								 	<strong>Success!</strong><a href="products.php"> View</a>.
								</div>
							</div> ';
					}

					if (isset($_GET['delete']) && !empty($_GET['delete'])){
						$deletedID = (int)$_GET['delete'];
						$deleteProduct = "UPDATE products SET archived = 1, featured = 0 WHERE id = '$deletedID'";
						$conn->query($deleteProduct);
						echo 
						'
						<div class="col-md-12">
							<div class="alert alert-success alert-dismissible" role="alert">
							 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 	<strong>Success!</strong><a href="products.php"> Product has been deleted</a>.
							</div>
						</div> ';
					}
				?>
				<div class="col-md-9">
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title">All Products</h3>
						</div>
						<div class="panel-body table-responsive">
							<a href="products.php?addproduct=true" id="products-margin" class="btn btn-success">Add new Product</a>
							<table class="table table-bordered table-condensed table-striped">
								<thead>
									<th>Edit Product</th>
									<th>Product</th>
									<th>Price</th>
									<th>Brand</th>
									<th>Featured</th>
									<th>Sold</th>
									<th>Delete Product</th>
								</thead>
								<tbody>
									<?php while($product = $query3->fetch_assoc()): 
									// querying the db to find out the products brand name
										$brandID = $product['brand'];
										$sql5 = "SELECT * FROM brands WHERE id = '$brandID'";
										$query5 = $conn->query($sql5);
										$brand = $query5->fetch_assoc();
										$brandname = $brand['brand_name'];
									?>
										<tr>
										<td>
											<a href="products.php?edit<?= $product['id']; ?>" class="btn btn-xs btn-default">
										    	<span class="glyphicon glyphicon-pencil"></span>
											</a>
										</td>
										<td><?= $product['title']; ?></td>
										<td>£<?= $product['our_price']; ?></td>
										<td><?= $brandname; ?></td>
										<td class="<?= (($product['featured'] == 1)?'success':'danger'); ?>">
										<a class="btn btn-xs btn-default" href="products.php?featured=<?=(($product['featured'] == 0)?'1':'0');?>&id=<?=$product['id'];?>">
											<span class="glyphicon glyphicon-<?= (($product['featured'] == 1)?'minus':'plus'); ?>"></span>
										</a>
										 <?= (($product['featured'] == 1)?'Featured Product':' Feature Product'); ?>
										</td>
										<td>0</td>
										<td>
											<a href="products.php?delete=<?= $product['id']; ?>" class="btn btn-xs btn-default">
											   	<span class="glyphicon glyphicon-remove"></span>
											</a>
										</td>
									<?php endwhile ;?>
								</tbody>
							</table>
							<a href="archived.php" id="products-margin" class="btn btn-danger <?= (($row['count'] == 0)?'disabled':'') ;?>"><?= (($row['count'] == 0)?''.$row['count'].' Deleted Products':''. $row['count'] .' Deleted Products, View Now') ?> </a>
						</div>
					</div>
				</div>
				<?php } ?>
				<?php 

				// amount of deleted products within the db
				$sql = "SELECT COUNT(*) AS count FROM products WHERE archived = 1";
				$query = $conn->query($sql);
				$row = $query->fetch_assoc();

				if (isset($_GET['addproduct']) || isset($_GET['editproduct'])) { 
					$sql1 = "SELECT * FROM brands WHERE archived = 0 ORDER BY brand_name";
					$query = $conn->query($sql1);
					// checking to see if input values are present and assigning them to a varaible
					// once set here we can then override them if the url is an add or an edit
					$title = ((isset($_POST['title']) && !empty($_POST['title']))?escape($_POST['title']):'');
					$price = ((isset($_POST['price']) && !empty($_POST['price']))?escape($_POST['price']):'');
					$stock = ((isset($_POST['stock']) && !empty($_POST['stock']))?escape($_POST['stock']):'');
					$brand = ((isset($_POST['brand']) && !empty($_POST['brand']))?escape($_POST['brand']):'');
					$storage = ((isset($_POST['storage']) && !empty($_POST['storage']))?escape($_POST['storage']):'');
					$type = ((isset($_POST['type']) && !empty($_POST['type']))?escape($_POST['type']):'');
					$size = ((isset($_POST['size']) && !empty($_POST['size']))?escape($_POST['size']):'');
					$editor1 = ((isset($_POST['editor1']) && !empty($_POST['editor1']))?escape($_POST['editor1']):'');

					if (isset($_GET['editproduct'])) {
						// assigning the get id to a variable
						// grab all information about a product using the get id
						// assign the product information to variables for editing purposes
						$editId = (int)$_GET['editproduct'];
						$editQuery = "SELECT * FROM  products WHERE id = '$editId'";
						$result = $conn->query($editQuery);
						$editInfo = $result->fetch_assoc();
						$title = ((isset($_POST['title']) && !empty($_POST['title']))?escape($_POST['title']):$editInfo['title']);
						$price = ((isset($_POST['price']) && !empty($_POST['price']))?escape($_POST['price']):$editInfo['our_price']);
						$stock = ((isset($_POST['stock']) && !empty($_POST['stock']))?escape($_POST['stock']):$editInfo['stock']);
						$brand = ((isset($_POST['brand']) && !empty($_POST['brand']))?escape($_POST['brand']):$editInfo['brand']);
						$storage = ((isset($_POST['storage']) && !empty($_POST['storage']))?escape($_POST['storage']):$editInfo['storage']);
						$type = ((isset($_POST['type']) && !empty($_POST['type']))?escape($_POST['type']):$editInfo['type']);
						$size = ((isset($_POST['size']) && !empty($_POST['size']))?escape($_POST['size']):$editInfo['size']);
						$editor1 = ((isset($_POST['editor1']) && !empty($_POST['editor1']))?escape($_POST['editor1']):$editInfo['description']);
					}

					if (postInputExists()) {
						if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
							$producterrors = ''; // setting up an empty array to store errors in for when they occur

							// foreach loop that will run through all the posted variable to check for errors
							$required = array('title','price','brand','editor1','storage', 'stock', 'type', 'size');
							foreach ($required as $require) {
								if ($_POST[$require] == '') {
									$producterrors[] .= 'All fields marked with * must been filled.';
									break;
								}
							}
						}

						// if errors not empty then it will display the in div 9 column with appriopiate error message
						if (!empty($producterrors)) {
							echo product_errors($producterrors);
						} else {
							$sql2 = "INSERT INTO products (title, our_price, brand, type, size, stock, description, storage) VALUES ('$title', '$price', '$brand', '$type', '$size', '$stock', '$editor1', '$storage')";

							// when get has been set this update query will run instead of the query above
							// the above query is for adding a product
							if (isset($_GET['editproduct'])) {
								$sql2 = "UPDATE products SET title = '$title', our_price = '$price', brand = '$brand', type = '$type', size = '$size', stock = '$stock', description = '$editor1', storage = '$storage' WHERE id = '$editId'";
							}
							// var_dump($sql2);die();
							$query2 = $conn->query($sql2);
							echo 
							'	
								<div class="col-md-9">
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
							   <h3 class="panel-title"><?=((isset($_GET['editproduct']))?'Edit ':'Add New ');?>Product</h3>
							</div>
							<div class="panel-body table-responsive">
								<form action="products.php?<?=((isset($_GET['editproduct']))?'editproduct='.$editId:'addproduct=1');?>" method="post" enctype="multipart/form-data">
								  <div class="form-group col-md-4">
									  <label for="title">Product Title*:</label>
									  <input class="form-control" type="text" name="title" id="title" value="<?=$title;?>">
								  </div>
								  <div class="form-group col-md-4">
									  <label for="price">Price*:</label>
									  <input class="form-control" type="text" name="price" id="price" value="<?=$price;?>">
								  </div>
								  <div class="form-group col-md-4">
									  <label for="stock">Stock*:</label>
									  <input class="form-control" type="text" name="stock" id="stock" value="<?=$stock;?>">
								  </div>
<!-- 								  <div class="form-group col-md-4">
									  <label for="ourprice">Our Price*:</label>
									  <input class="form-control" type="text" name="ourprice" id="ourprice">
								  </div> -->
								  <div class="form-group col-md-4">
									  <label for="brand">Brand*:</label>
									  <select class="form-control" name="brand" id="brand">
									  	<option value="<?=$brand;?>"></option>
									  	<?php while($row = $query->fetch_assoc()): ?>
									  		<option value="<?=$row['id'];?>"<?=(($brand == $row['id'])?' Selected':'');?>><?= $row['brand_name']; ?></option>
									  	<?php endwhile; ?>
									  </select>
								  </div>
								  <div class="form-group col-md-4">
									  <label for="storage">Storage*:</label>
									  <select class="form-control" name="storage" id="storage">
									  	<option value=""></option>
									  	<option value="1">Yes</option>
									  	<option value="0">No</option>
									  </select>
								  </div>
								  <div class="form-group col-md-4">
									  <label for="type">Type*:</label>
									  <select class="form-control" name="type" id="type">
									  	<option value="<?=$type;?>"><?=$type;?></option>
									  	<option value="Bed">Bed</option>
									  	<option value="Mattress">Mattress</option>
									  	<option value="Headboard">Headboard</option>
									  </select>
								  </div>
								  <div class="form-group col-md-4">
									  <label for="size">Size*:</label>
									  <select class="form-control" name="size" id="size">
									  	<option value="<?=$size;?>"><?=$size;?></option>
									  	<option value="Single">Single</option>
									  	<option value="Small Double">Small Double</option>
									  	<option value="Double">Double</option>
									  	<option value="King Size">King Size</option>
									  </select>
								  </div>
								  <!-- <div class="form-group col-md-8">
									  <label for="image">Product Image:</label>
									  <input class="form-control" type="file" name="image" id="image">
								  </div> -->
								  <div class="form-group col-md-12">
									  <label for="editor1">Product Description*:</label>
									  <textarea id="editor1" name="editor1" class="form-control" rows="8"><?=$editor1;?></textarea>
								  </div>
								  <div class="form-group col-md-12">
									  <a href="products.php" class="btn btn-danger col-md-2">Cancel</a>
									  <input type="hidden" name="token" value="<?= $token; ?>">
									  <input type="submit" class="btn btn-success col-md-2 pull-right" value="<?=((isset($_GET['editproduct']))?'Edit ':'Add ');?>Product">
								  </div>
								</form>
							</div>
						</div>
					</div>
				<?php } else {

				// grabs all products from within the products table
				$sql3 = "SELECT * FROM products WHERE archived = 0 ORDER BY type DESC";
				$query3 = $conn->query($sql3);

				// products per page = 10
				$products_per_page = 8;

				// number of rows of products (i.e. 88)
				$paginationResult = $conn->query($sql3);
				$paginationRows = $paginationResult->num_rows;

				// total pages according to the products per page
				$paginationPages = ceil($paginationRows/$products_per_page);

				// page number user is currently on
				if (!isset($_GET['pn'])) {
				 	$page = 1;
				} else {
					$page = $_GET['pn'];
				}

				// LIMIT of records per page and products per page
				$limit = ($page-1)*$products_per_page;

				// $pageNumber = ($page-1)*$products_per_page;
				// query DB to get products using the LIMIT set up above
				$limitQuery = "SELECT * FROM products WHERE archived = 0 LIMIT " . $limit . ", " . $products_per_page;
				$limitResult = $conn->query($limitQuery); 

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
						'	<div class="col-md-9">
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
						   <h3 class="panel-title">All Products || Total Rows: <?=$paginationRows;?> || Total Pages: <?=$paginationPages;?></h3>
						</div>
						<div class="panel-body table-responsive">
							<a href="archived.php" id="products-margin" class="btn btn-danger <?= (($row['count'] == 0)?'disabled':'') ;?>"><?= (($row['count'] == 0)?''.$row['count'].' Deleted Products':''. $row['count'] .' Deleted Products, View Now') ?> </a>
							<a href="products.php?addproduct=true" id="products-margin" class="btn btn-success">Add new Product</a>
							<table class="table table-bordered table-condensed table-striped">
								<thead>
									<th>Edit Product</th>
									<th>Product</th>
									<th>Price</th>
									<th>Brand</th>
									<th>Size</th>
									<th>Storage</th>
									<th>Stock Level</th>
									<th>Type</th>
									<th>Featured</th>
									<th>Sold</th>
									<th>Delete Product</th>
								</thead>
								<tbody>
									<?php while($product = $limitResult->fetch_assoc()): 
									// querying the db to find out the products brand name
										$brandID = $product['brand'];
										$sql5 = "SELECT * FROM brands WHERE id = '$brandID'";
										$query5 = $conn->query($sql5);
										$brand = $query5->fetch_assoc();
										$brandname = $brand['brand_name'];
									?>
										<tr>
										<td>
											<a href="products.php?editproduct=<?= $product['id']; ?>" class="btn btn-xs btn-default">
										    	<span class="glyphicon glyphicon-pencil"></span>
											</a>
										</td>
										<td><?= $product['title']; ?></td>
										<td>£<?= $product['our_price']; ?></td>
										<td><?= $brandname; ?></td>
										<td><?= $product['size']; ?></td>
										<td><?= (($product['storage'] == 0)?'None':'Yes');?></td>
										<td class="<?=(($product['stock'] < 20)?'danger':'');?>"><?= $product['stock']; ?></td>
										<td><?= $product['type']; ?></td>
										<td class="<?= (($product['featured'] == 1)?'success':'danger'); ?>">
										<a class="btn btn-xs btn-default" href="products.php?featured=<?=(($product['featured'] == 0)?'1':'0');?>&id=<?=$product['id'];?>">
											<span class="glyphicon glyphicon-<?= (($product['featured'] == 1)?'minus':'plus'); ?>"></span>
										</a>
										 <?= (($product['featured'] == 1)?'Featured':' Feature'); ?>
										</td>
										<td><?= $product['sold']; ?></td>
										<td>
											<a href="products.php?delete=<?= $product['id']; ?>" class="btn btn-xs btn-default">
											   	<span class="glyphicon glyphicon-remove"></span>
											</a>
										</td>
									<?php endwhile ;?>
								</tbody>
							</table>
							<nav aria-label="Page navigation" class="text-center">
							  <ul class="pagination">
							    <li>
							      <a href="#" aria-label="Previous">
							        <span aria-hidden="true">&laquo;</span>
							      </a>
							    </li>
							    	<?php 
										for ($page=1;$page<=$paginationPages;$page++) {
										 	echo '<li><a href="?pn=' . $page . '"> ' . $page . ' </a></li>';
										}
									?>
							    <li>
							      <a href="#" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							      </a>
							    </li>
							  </ul>
							</nav>
						</div>
					</div>
				</div>
				<?php } ?>
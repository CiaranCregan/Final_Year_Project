				<?php
				$brandsql = "SELECT * FROM brands WHERE archived = 1 ORDER BY brand_name";
				$brandresults = $conn->query($brandsql);

				$productsql = "SELECT * FROM products WHERE archived = 1 ORDER BY title";
				$productresult = $conn->query($productsql);

				// amount of deleted products within the db
				$sql = "SELECT COUNT(*) AS count FROM products WHERE archived = 1";
				$query = $conn->query($sql);
				$row = $query->fetch_assoc();

				// amount of deleted brands within the db
				$sql1 = "SELECT COUNT(*) AS count FROM brands WHERE archived = 1";
				$query1 = $conn->query($sql1);
				$row1 = $query1->fetch_assoc();

				if (isset($_GET['bRecover']) && !empty($_GET['bRecover'])) {
					$bRecover_id = (int)$_GET['bRecover'];
					$recoverQuery = "UPDATE brands SET archived = 0 WHERE id = '$bRecover_id'";
					$conn->query($recoverQuery);
					echo 
					'	<div class="col-md-12">
							<div class="alert alert-success alert-dismissible" role="alert">
							 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 	<strong>Success!</strong><a href="brands.php"> Brand has been recovered</a>.
							</div>
						</div> ';
				}

				if (isset($_GET['pRecover']) && !empty($_GET['pRecover'])) {
					$pRecover_id = (int)$_GET['pRecover'];
					$recoverQuery = "UPDATE products SET archived = 0 WHERE id = '$pRecover_id'";
					$conn->query($recoverQuery);
					echo 
					'	<div class="col-md-12">
							<div class="alert alert-success alert-dismissible" role="alert">
							 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 	<strong>Success!</strong><a href="products.php"> Products has been recovered</a>.
							</div>
						</div> ';
				}
				?>

				<div class="col-md-3">
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title">Deleted Brands</h3>
						</div>
						<div class="panel-body table-responsive">
						<?php if ($row1['count'] < 1) {

							echo '<h3 class="text-center">There are no Deleted Records available</h3>';
							
						} else { ?>
							<table class="table table-bordered table-striped">
							  <thead>
							    <th>Restore Brand</th>
							    <th>Brand</th> 
							  </thead>
							  <tbody>
							  <?php while ($archived = $brandresults->fetch_assoc()) : ?>
								  <tr>
								    <td>
									    <a href="archived.php?bRecover=<?=$archived['id'];?>" class="btn btn-xs btn-default">
									    	<span class="glyphicon glyphicon-refresh"></span>
									    </a>
								    </td>
								    <td><?= $archived['brand_name'];?></td>
								  </tr>
								<?php endwhile;?>
							  </tbody>
							</table>
						<?php } ?>
						</div>
					</div>
				</div>

				<div class="col-md-9">
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title">Deleted Products</h3>
						</div>
						<div class="panel-body table-responsive">
						<?php if ($row['count'] < 1 ) {

							echo '<h3 class="text-center">There are no Deleted Records available</h3>';

						} else { ?>
						
							<table class="table table-bordered table-striped">
								<thead>
									<th>Restore Product</th>
									<th>Product</th>
									<th>Price</th>
									<th>Brand</th>
									<th>Featured</th>
									<th>Sold</th>
								</thead>
								<tbody>
								<?php while ($archived = $productresult->fetch_assoc()) : ?>
										<tr>
										<td>
											<a href="archived.php?pRecover=<?=$archived['id'];?>" class="btn btn-xs btn-default">
										    	<span class="glyphicon glyphicon-refresh"></span>
											</a>
										</td>
										<td><?=$archived['title'];?></td>
										<td>£<?=$archived['price'];?></td>
										<td></td>
										<td class="<?= (($archived['featured'] == 1)?'success':'danger'); ?>">
										 <?= (($archived['featured'] == 1)?'Featured Product':' Product has been deleted.'); ?>
										</td>
										<td>0</td>
								<?php endwhile; ?>
								</tbody>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>
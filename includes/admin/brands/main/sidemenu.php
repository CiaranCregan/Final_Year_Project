				<?php
					$showBrands = "SELECT * FROM brands WHERE archived = 0 ORDER BY brand_name";
					$result = $conn->query($showBrands);
				?>
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title">Bed Brands</h3>
						</div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
							  <thead>
							    <th></th>
							    <th>Brand</th> 
							    <th></th>
							  </thead>
							  <tbody>
							  	<?php while ($brand = $result->fetch_assoc()) : ?>
								  <tr>
								    <td>
									    <a href="brands.php?edit=<?= $brand['id']; ?>" class="btn btn-xs btn-default">
									    	<span class="glyphicon glyphicon-pencil"></span>
									    </a>
								    </td>
								    <td>
								    	<?= $brand['brand_name']; ?>
								    </td>
								    <td>
								    	<a href="brands.php?delete=<?= $brand['id']; ?>" class="btn btn-xs btn-default">
									    	<span class="glyphicon glyphicon-remove"></span>
									    </a>
								    </td>
								  </tr>
								<?php endwhile; ?>
							  </tbody>
							</table>
						</div>
					</div>
				</div>
			<?php 

				// Edit brand name statement
				if (isset($_GET['edit']) && !empty($_GET['edit'])) {
					$edit_brand_id = (int)$_GET['edit'];
					$edit_sql = "SELECT * FROM brands WHERE id = '$edit_brand_id'";
					$edit_result = $conn->query($edit_sql);
					$edit_brand = $edit_result->fetch_assoc();
				}
				// validation and creting brand name statement
				// checks if input has been supplied as well as the token using the input function and token session
				if (postInputExists()) {
					if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {
						$brand_name = escape($_POST['brand']);

						if ($_POST['brand'] == '') {
							$branderrros[] = 'There must be a value supplied';
						}
							//check db to see of brand name already exists
							$brandName = "SELECT * FROM brands WHERE brand_name = '$brand_name'";

								// get query goes here
								if (isset($_GET['edit'])) {
									$brandName = "SELECT * FROM brands WHERE brand_name = '$brand_name' AND id != '$edit_brand_id'";
								}

							$result = $conn->query($brandName);
							$brandNameCount = $result->num_rows;

							if ($brandNameCount > 0) {
								$branderrros[] = $brand_name . ' already exsists, please provide a different brand name';
							}

						// if brand errors exist displa them here
						if (!empty($branderrros)) {
							echo brand_errors($branderrros);
						} else {
							// no errors, insert content to db
							$brandInsert = "INSERT INTO brands (brand_name) VALUES ('$brand_name')";
								// change sql to update when get has been set
								if (isset($_GET['edit'])) {
									$brandInsert = "UPDATE brands SET brand_name = '$brand_name' WHERE id = '$edit_brand_id'";
								}

							$success = $conn->query($brandInsert);
							//header("Location: brands.php");
						}
					}
				}

				// deleteing brand name statement
				if (isset($_GET['delete']) && !empty($_GET['delete'])) {
					$brand_delete_id = (int)$_GET['delete'];
					$brand_query = "UPDATE brands SET archived = 1 WHERE id = '$brand_delete_id'";
					$conn->query($brand_query);
					echo 
					'	<div class="col-md-7">
							<div class="alert alert-success alert-dismissible" role="alert">
							 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 	<strong>Success!</strong><a href="brands.php"> Brand has been deleted</a>.
							</div>
						</div> ';
				}

				// input if statement to carry over brand name for editing purposes
				// used for editing purposes only
				$brand_value = '';
				if(isset($_GET['edit'])){
					$brand_value = escape($edit_brand['brand_name']);
				} else{
					if (isset($_POST['brand'])) {
						$brand_value = $_POST['brand'];
					}
				}

				$token = $_SESSION['token'] = md5(uniqid());
			?>
				<div class="col-md-7">
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title"><?=((isset($_GET['edit']))?'Edit ':'Add '); ?>Brand</h3>
						</div>
						<div class="panel-body">
							<!-- Adding brand from -->
								<form class="form-inline" action="brands.php<?=((isset($_GET['edit']))?'?edit='.$edit_brand_id:''); ?>" method="post">
									<div class="form-group">
									  <label for="brand"><?=((isset($_GET['edit']))?'Edit ':'Add '); ?>Brand Name:</label>
									  <input class="form-control" type="text" name="brand" id="brand" value="<?= $brand_value; ?>">
								  	</div>
								  
								  <input type="hidden" name="token" value="<?= $token; ?>">
								  <?php if(isset($_GET['edit'])): ?>
								  	<a href="brands.php" class="btn btn-danger">Cancel</a>
								  <?php endif; ?>
								  <input type="submit" value="<?=((isset($_GET['edit']))?'Edit ':'Add '); ?>New Brand" class="btn btn-success" name="insert_submit">
								</form>
							<!-- End of Adding brand from -->
						</div>
					</div>
				</div>

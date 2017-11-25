<?php
	require_once 'core/init.php';

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
						$sql = "SELECT * FROM brands WHERE brand = '$brand_name' AND id != '$edit_brand_id'";
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
				$success = $conn->query($brandInsert);
				echo 
				'	
					<div class="col-md-7">
						<div class="alert alert-success alert-dismissible" role="alert">
							 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							 	<strong>Success!</strong><a href="brands.php"> View</a>.
						</div>
					</div> 
				';
			}
		}
	}

	$token = $_SESSION['token'] = md5(uniqid());
?>

<div class="col-md-7">
					<div class="panel panel-default">
						<div id="m-color" class="panel-heading">
						   <h3 class="panel-title">Brand</h3>
						</div>
						<div class="panel-body">
							<!-- Adding brand from -->
								<form class="form-inline" action="exmaplefile.php" method="post">
									<div class="form-group">
									  <label for="brand">Brand Name:</label>
									  <input class="form-control" type="text" name="brand" id="brand" value="">
								  	</div>
								  
								  <input type="hidden" name="token" value="<?= $token; ?>">
								  <?php if(isset($_GET['edit'])): ?>
								  	<a href="brands.php" class="btn btn-danger">Cancel</a>
								  <?php endif; ?>
								  <input type="submit" value="New Brand" class="btn btn-success" name="insert_submit">
								</form>
							<!-- End of Adding brand from -->
						</div>
					</div>
				</div>

				$password = 'password';
		echo password_hash($password, PASSWORD_DEFAULT);
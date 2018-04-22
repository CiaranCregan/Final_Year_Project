<?php 
require_once 'core/init.php';
include 'includes/overall/m_header.php';

if (postInputExists()) {
	$searchProductResult = escape($_POST['search']);
	$query = "SELECT * FROM products WHERE title LIKE '%$searchProductResult%' AND archived = 0";
	$result = $conn->query($query);
	$numRows = $result->num_rows;

	if ($_POST['search'] == '') {
		echo '
		 <div class="container">
		 	<h2 class="text-center">Please enter a product name or something simliar to see the results.</b></h2>
		 </div>
		 ';
	} elseif ($numRows == 0) {
		 echo '
		 <div class="container">
		 	<h2 class="text-center">There are no products related to <b class="text-danger">'.$searchProductResult.'</b>.</h2>
		 </div>
		 ';
	} else {
		echo 
		'
		<div class="container">
			<section id="best-sellers">
				<h2 class="text-center">There are '.$numRows.' products related to <b class="text-success">'.$searchProductResult.'</b>.</h2>
		';
		while ($searchProduct = $result->fetch_assoc()) {
			echo '<div class="col-md-3 col-sm-3 col-xs-12">
						<img src="'.$searchProduct['image'].'" alt="'.$searchProduct['image'].'" class="img-thumb">
						<h4 class="text-center">'.$searchProduct['title'].'</h4>
						<h4 class="text-center"><b>'.(($searchProduct['storage'] == 0)?'without Drawers':'with Drawers').'</b></h4>
						<h4 class="text-center">'.$searchProduct['size'].'</h4>
						<div class="content text-center">
							<h3 class="text-success">Price: £'.$searchProduct['our_price'].'</h3>
						</div>
						<button type="button" class="btn btn-main btn-block" onclick="featuredetails('.$searchProduct['id'].')">View product</button>
			</div>';
		}
		echo 
		'
			</section>
		</div>';
		include 'includes/overall/m_footer.php';
	}
} else {
	header("Location: index.php");
}
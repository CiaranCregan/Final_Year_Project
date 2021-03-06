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


// var_dump(escape("<script></script>"));

//$string = "ciarancregan123";

// if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $string)) {
//     echo 'the string does not meet the requirements!';
// } else {
// 	echo 'The string does match';
// }

// if (strlen($string) < 6 || strlen($string) > 20) {
//  	echo "Failed";
// } else {
// 	echo "passed";
// }

// echo $_SERVER['PHP_SELF'];


// include 'includes/overall/a_header.php';
// $password = 'shoppingcartcookie';

// $password_hashed = password_hash($password, PASSWORD_DEFAULT);

// $path = $_SERVER['PHP_SELF'];

// echo $path . '<br>'; 

// preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password

// echo $password_hashed . '<br>';

// echo dirname($_SERVER['PHP_SELF']);

// echo date('Y-m-d');
// $yesterday = date('d.m.Y',strtotime("-1 days"));

// echo $yesterday;
// $sql = "SELECT * FROM products WHERE sold > 0 GROUP BY sold ORDER BY sold desc LIMIT 5";
// $result = $conn->query($sql);
// $value = '';

// $value .= '
// 	<table class="table">
//   		<th>id</th>
//   		<th>Title</th>
//   		<th>Sold</th>
//   		<th>Price</th>
//   		<th>Amount Made</th>
// ';
// while ($row = $result->fetch_assoc()) {
// 	$id = $row['id'];
// 	$title = $row['title'];
// 	$sold = $row['sold'];
// 	$our_price = $row['our_price'];
// 	$soldAmount = $sold * $our_price;
// 	$value .= '

// 		<tr>
// 			<td>'.$id.'</td>
// 			<td>'.$title.'</td>
// 			<td>'.$sold.'</td>
// 			<td>£'.$our_price.'.00</td>
// 			<td>£'.$soldAmount.'.00</td>
// 		</tr>

// 	';

// }

// $value .= '</table>';

// echo $value;
?>

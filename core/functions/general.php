<?php

/* 
Note

Had to remove functions folder and place the general function within a folder called functions inside the core
folder. Once this was done the errors that I was facing where no longer.

Problem was arising because the system was looking for the functions folder within the relative.

*/

//input functions
function postInputexists(){
	return (!empty($_POST)) ? true : false;
}
function getInputExists(){
	return (!empty($_GET)) ? true : false;
}

// error functions
function brand_errors($branderrors){
	$display = '<div class="col-md-7">';
		foreach ($branderrors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

function product_errors($producterrors){
	$display = '<div class="col-md-9">';
		foreach ($producterrors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

function login_errors($loginerrors){
	$display = '<div class="col-md-6">';
		foreach ($loginerrors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

function errors($errors){
	$display = '<div class="col-md-12">';
		foreach ($errors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

// Sanitize function
function escape($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
// Product Views
function updateProductViews($id){
	global $conn;
	$productId = $id;
	$selectQuery = "SELECT * FROM products WHERE id = '$productId'";
	$result = $conn->query($selectQuery);
	$product = $result->fetch_assoc();
	$productViews = $product['viewed'];
	$productUpdateViews = $productViews + 1;
	$updateQuery = "UPDATE products SET viewed = '$productUpdateViews' WHERE id = '$productId'";
	$conn->query($updateQuery);
}

// login functions
function login($user_id) {
	$_SESSION['userid'] = $user_id;
	// insert global $conn;
	// add in last login date

	header("Location: index.php");
}

function loggedin(){
	if (isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
		return true;
	}
	return false;
}

function employee_access($role = ''){
	global $user;
	$roles = explode(',', $user['roles']);
	if (in_array($role, $roles, true)) {
		return true;
	}
	return false;
}

function error_redirect($url = ''){
	header("Location: " . $url);
}

// ANALYTICS

function newOrders(){
	global $conn;
	$sql = "SELECT COUNT(*) AS count FROM payments WHERE status = 0";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['count'];
}

function viewedOrders(){
	global $conn;
	$sql = "SELECT COUNT(*) AS count FROM payments WHERE status = 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['count'];
}

function deliveredOrders(){
	global $conn;
	$sql = "SELECT COUNT(*) AS count FROM payments WHERE delivered = 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['count'];
}

function totalAmountOfOrders(){
	global $conn;
	$sql = "SELECT COUNT(*) AS count FROM payments";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['count'];
}

function totalSpendAmount(){
	global $conn;
	$date = date('Y-m-d');
	$sql = "SELECT SUM(total) AS total FROM payments";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];
}

function totalSpendYesterday(){
	global $conn;
	$date = date('Y-m-d',strtotime("-1 days"));
	$sql = "SELECT SUM(total) AS Total FROM payments WHERE payment_date = '$date'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['Total'];
}

function totalSpendToday(){
	global $conn;
	$date = date('Y-m-d');
	$sql = "SELECT SUM(total) AS total FROM payments WHERE payment_date = '$date'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row['total'];
}

function overall() {
	global $conn;
	$query = "SELECT COUNT(*) As Overall FROM shopping_cart";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$total = $row['Overall'];
	return $total;
}

function purchased() {
	global $conn;
	$query = "SELECT COUNT(*) As Purchased FROM shopping_cart WHERE purchased = 1";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$total = $row['Purchased'];
	return $total;	
}

function failed() {
	global $conn;
	$query = "SELECT COUNT(*) As failed FROM shopping_cart WHERE purchased = 0";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$total = $row['failed'];
	return $total;	
}

function topSoldProducts(){
	global $conn;
	$sql = "SELECT * FROM products WHERE sold > 0 ORDER BY sold desc LIMIT 10";
	$result = $conn->query($sql);
	$value = '';

	$value .= '
		<div class="table-responsive">
		<table class="table">
	  		<th>Product ID Number</th>
	  		<th>Title</th>
	  		<th>Size</th>
	  		<th>Sold</th>
	  		<th>Sold Amount</th>
	  		<th>Featured</th>
	';
	while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$title = $row['title'];
		$sold = $row['sold'];
		$size = $row['size'];
		$soldAmount = $row['our_price'] * $sold;
		$featured = $row['featured'];
		$value .= '
			<tr>
				<td>'.$id.'</td>
				<td>'.$title.'</td>
				<td>'.$size.'</td>
				<td>'.$sold.'</td>
				<td>£'.$soldAmount.'.00</td>
				<td class="'.(($featured == 0)?"danger":"success").'">'.(($featured > 0)?"Yes":"No").'</td>
			</tr>
		';
	}
	$value .= '</table></div>';

	return $value;
}

// function topSoldProductsTest(){
// 	global $conn;
// 	$sql = "SELECT * FROM products WHERE sold >= 0 ORDER BY sold desc LIMIT 5";
// 	$result = $conn->query($sql);
// 	$title = array();
// 	$sold = array();
// 	$value = '';

// 	$value .= '
// 		var ctx = document.getElementById("myChart").getContext("2d");
// 		var chart = new Chart(ctx, {
// 		    // The type of chart we want to create
// 		    type: "line",

// 		    // The data for our dataset
// 		    data: {
// 	';
// 	while ($row = $result->fetch_assoc()) {
// 		array_push($title, $row['title']);
// 		array_push($sold, $row['sold']);
// 	}
// 	$value .= '
// 			labels: ["'.$title[0].'","'.$title[1].'","'.$title[2].'","'.$title[3].'","'.$title[4].'"],
// 	        datasets: [{
// 	            label: "Products Sold",
// 	            backgroundColor: "rgb(255, 99, 132)",
// 	            borderColor: "rgb(255, 99, 132)",
// 	            data: ['.$sold[0].','.$sold[1].','.$sold[2].','.$sold[3].','.$sold[4].'],
// 	            fill: false,
// 	        }]
// 	';
// 	$value .= '
// 		},
// 		    // Configuration options go here
// 		    options: {
// 		    	responsive: true,
// 		    	scales: {
// 		    		xAxes: [{
// 						ticks: {
// 							min: 0
// 						}
// 					}],
//         			yAxes: [{
//             			ticks: {
//                 			min: 0
//             			}	
//         			}]
//     			}
// 		    }
// 		});
// 		';

// 	return $value;
// }
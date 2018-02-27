<?php 
require_once 'core/init.php';
// $password = 'shoppingcartcookie';

// $password_hashed = password_hash($password, PASSWORD_DEFAULT);

// $path = $_SERVER['PHP_SELF'];

// echo $path . '<br>';

// echo $password_hashed . '<br>';

// echo dirname($_SERVER['PHP_SELF']);

// echo date('Y-m-d');


				// // products per page = 10
				// $results_per_page = 10;

				// // number of rows of products (i.e. 88)
				// $Query = "SELECT * FROM products";
				// $qResult = $conn->query($Query);
				// $pRows = $qResult->num_rows;

				//  // while ($row = $qResult->fetch_assoc()) {
				//  // 	echo 'id: ' . $row['id'] . ' - ' . $row['title'] . ' <br> ';
				//  // }

				// // total pages according to the products per page
				// $pPages = ceil($pRows/$results_per_page);

				// // page number user is currently on
				// if (!isset($_GET['pn'])) {
				//  	$page = 1;
				// } else {
				// 	$page = $_GET['pn'];
				// }

				// // // LIMIT of records per page and products per page
				// $limit = ($page-1)*$results_per_page; 
				
				// // $pageNumber = ($page-1)*$products_per_page;
				// // query DB to get products using the LIMIT set up above
				// $anotherQuery = "SELECT * FROM products LIMIT " . $limit . ", " . $results_per_page;
				// $result = $conn->query($anotherQuery);

				//  while ($row2 = $result->fetch_assoc()) {
				//  	echo 'id: ' . $row2['id'] . ' - ' . $row2['title'] . ' <br> ';
				//  }

				//  for ($page=1;$page<=$pPages;$page++) {
				//  	echo '<a href="?pn=' . $page . '"> ' . $page . ' </a>';
				//  } 
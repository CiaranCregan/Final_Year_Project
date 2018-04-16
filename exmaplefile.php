<?php 
require_once 'core/init.php';
// var_dump(escape("<script></script>"));

$string = "ciarancregan123";

// if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $string)) {
//     echo 'the string does not meet the requirements!';
// } else {
// 	echo 'The string does match';
// }

if (strlen($string) < 6 || strlen($string) > 20) {
 	echo "Failed";
} else {
	echo "passed";
}

echo $_SERVER['PHP_SELF'];


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

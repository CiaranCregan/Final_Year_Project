<?php

require_once '../core/init.php';

// get the data coming from the featured modal
$id = escape($_POST['id']);
$quantity = escape($_POST['quantity']);

// setting up an array that will allow me to store the items in a json string
$added_items = array();
$added_items[] = array(
	'id' => $id,
	'quantity' => $quantity
);
// setting a path for localhost so that cookies are accessible
//$path = ($_SERVER['HTTP_POST'] != 'localhost')?'.' . $_SERVER['HTTP_POST']:false;
// sql statement that will allow me to print out the added items
// so that the user can see the item added in an alert box
$query = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($query);
$product = $result->fetch_assoc();
$_SESSION['success-message-flash'] = $quantity . ' ' . $product['title'] . ' has been added to your basket';

// if there is a shopping cart id set then update the DB instead of adding in a new record
if ($shopping_cart_id != '') {
	// sql statement that will allow me to get the items within the DB
	$query = "SELECT * FROM shopping_cart WHERE id = '$shopping_cart_id'";
	$result = $conn->query($query);
	$cart = $result->fetch_assoc();
	// variable that will decode the items that where first added in as a json string
	$cart_items = json_decode($cart['items'], true);
	// matched items variable will change to 1 if an added item already exists to that shopping_cart_id
	$matched_items = 0;
	$new_cart_items = array();
	foreach ($cart_items as $an_item) {
		if ($added_items[0]['id'] == $an_item['id']) {
			$an_item['quantity'] = $an_item['quantity'] + $added_items[0]['quantity'];
			$matched_items = 1;
		}
		// when checking the avialable add in the if statement here
		$new_cart_items[] = $an_item;
	}
	if ($matched_items != 1) {
		$new_cart_items = array_merge($added_items,$cart_items);
	}
	$new_cart_item = json_encode($new_cart_items);
	$cart_item_expire = date('Y-m-d H:i:s', strtotime('+30 days'));
	$conn->query("UPDATE shopping_cart SET items = '$new_cart_item', item_expire_date = '$cart_item_expire' WHERE id = '$shopping_cart_id'");
	setcookie(SHOPPING_CART_COOKIE,'',1,'/',false);
	setcookie(SHOPPING_CART_COOKIE,$shopping_cart_id,SHOPPING_CART_EXPIRE_DATE,'/',false);
} else {
	// ADD ITEMS INTO THE DATABASE
	$cart_item = json_encode($added_items);
	$cart_item_expire = date('Y-m-d H:i:s', strtotime('+30 days'));
	$query = "INSERT INTO shopping_cart (items,item_expire_date) VALUES ('$cart_item', '$cart_item_expire')";
	$conn->query($query);
	$shopping_cart_id = $conn->insert_id;
	setcookie(SHOPPING_CART_COOKIE,$shopping_cart_id,SHOPPING_CART_EXPIRE_DATE,'/',false);
}
?>
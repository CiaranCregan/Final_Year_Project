<?php

require_once '../core/init.php';

// get the data coming from the featured modal
$id = escape($_POST['id']);
$quantity = escape($_POST['quantity']);
$side = escape($_POST['side']);
$color = escape($_POST['color']);

// setting up an array that will allow me to store the items in a json string
$added_items = array();
$added_items[] = array(
	'id' => $id,
	'quantity' => $quantity,
	'side' => $side,
	'color' => $color
);

// sql statement that will allow me to print out the added items
// so that the user can see the item added in an alert box
// success message flash 
$query = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($query);
$product = $result->fetch_assoc();
$_SESSION['success-message-index'] = $quantity . ' ' . $product['title'] . ' has been added to your basket';


// if there is a shopping cart id set then update the DB instead of adding in a new record
if ($shopping_cart_id != '') {
	// sql statement that will allow me to get the items within the DB
	$query = "SELECT * FROM shopping_cart WHERE id = '$shopping_cart_id'";
	$result = $conn->query($query);
	$cart = $result->fetch_assoc();
	// variable that will decode the items that where first added in as a json string when no cart id existed
	$cart_items = json_decode($cart['items'], true);
	// matched items variable will change to 1 if an added item already exists within a shopping carts $cart_items
	$matched_items = 0;
	$new_cart_items = array();
	// loop through the items currently in the shopping cart associated with the current $shopping_cart_id
	foreach ($cart_items as $an_item) {
		// this checks to see if the items being added (id, side, colour) matches an item within the $shopping_cart_id items
		if ($added_items[0]['id'] == $an_item['id'] && $added_items[0]['side'] == $an_item['side'] && $added_items[0]['color'] == $an_item['color']) {
			// if all matches then that items quantity is updated to the quantity added on top of the quantity already there
			$an_item['quantity'] = $an_item['quantity'] + $added_items[0]['quantity'];
			$matched_items = 1; // $matched_items now equals one if the above is true
		}
		// $new_cart_items[] now becomes $an_item since $macthed_items = 1 
		$new_cart_items[] = $an_item;
	}
	// check and see if the quanitity being entered isnt greater than the quantity within the DB related to that product

	// if $matched_items = 0 then just added the new item to that $shopping_carts_id items.
	// New items comes first then the old items
	if ($matched_items != 1) {
		$new_cart_items = array_merge($added_items,$cart_items);
	}
	$new_cart_item = json_encode($new_cart_items);
	$cart_item_expire = date('Y-m-d H:i:s', strtotime('+30 days'));
	$conn->query("UPDATE shopping_cart SET items = '$new_cart_item', item_expire_date = '$cart_item_expire' WHERE id = '$shopping_cart_id'");
	setcookie(SHOPPING_CART_COOKIE,'',1,'/',false); // if matched 1 then kill cookie
	setcookie(SHOPPING_CART_COOKIE,$shopping_cart_id,SHOPPING_CART_EXPIRE_DATE,'/',false); // set new cookie here
} else {
	// If no $shopping_cart_id exists then the added items array will just add straight into the DB and the above code will be skipped
	$cart_item = json_encode($added_items);
	$cart_item_expire = date('Y-m-d H:i:s', strtotime('+30 days'));
	$query = "INSERT INTO shopping_cart (user_id,items,item_expire_date) VALUES ('$user_id','$cart_item', '$cart_item_expire')";
	$conn->query($query);
	$shopping_cart_id = $conn->insert_id;
	setcookie(SHOPPING_CART_COOKIE,$shopping_cart_id,SHOPPING_CART_EXPIRE_DATE,'/',false); // set cookie here
}
?>
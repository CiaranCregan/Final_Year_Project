<?php

	require_once '../core/init.php';

	$mode = escape($_POST['mode']);
	$id = escape($_POST['id']);
	$side = escape($_POST['side']);
	$color = escape($_POST['color']);

	$cartQ = "SELECT * FROM shopping_cart WHERE id = '$shopping_cart_id'";
	$result = $conn->query($cartQ);
	$cart = $result->fetch_assoc();

	$items = json_decode($cart['items'],true);

	$updated_items = array();

	if ($mode == 'minus') {
		foreach ($items as $item) {
			if ($item['id'] == $id && $item['side'] == $side && $item['color'] == $color) {
				$item['quantity'] = $item['quantity'] - 1;
			}
			if ($item['quantity'] > 0) {
				$updated_items[] = $item;
			}
		}
	}

	if ($mode == 'add') {
		foreach ($items as $item) {
			if ($item['id'] == $id && $item['side'] == $side && $item['color'] == $color) {
				$item['quantity'] = $item['quantity'] + 1;
			}
			$updated_items[] = $item;
		}
	}

	if (!empty($updated_items)) {
		$json_updated = json_encode($updated_items);
		$sql = "UPDATE shopping_cart SET items = '$json_updated' WHERE id = '$shopping_cart_id'";
		$conn->query($sql);
	}

	if (empty($updated_items)) {
		$Dsql = "DELETE FROM shopping_cart WHERE id = '$shopping_cart_id'";
		$conn->query($Dsql);
		setcookie(SHOPPING_CART_COOKIE,'',1,'/',false);
	}
?>
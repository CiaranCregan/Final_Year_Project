<?php

require_once '../core/init.php';

$id = $_POST['id'];
$quantity = $_POST['quantity'];

$added_items = array();
$added_items[] = array(
	'id' => $id,
	'quantity' => $quantity
);

$query = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($query);
$product = $result->fetch_assoc();

$_SESSION['success-flash'] = $quantity . ' ' . $product['title'] . ' has been added to your basket';
?>
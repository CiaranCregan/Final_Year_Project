<?php

$conn = @new mysqli("localhost", "root", "", "finalyearproject");

if ($conn->connect_error) {
	echo 'Error occured';
	die();
}
session_start();
include 'const.php';
include 'functions/general.php';
require 'vendor/autoload.php';

$shopping_cart_id = '';
$shopping_cart_num_items = '';
if (isset($_COOKIE[SHOPPING_CART_COOKIE])) {
	$shopping_cart_id = escape($_COOKIE[SHOPPING_CART_COOKIE]);

	$query = "SELECT * FROM shopping_cart WHERE id = '$shopping_cart_id'";
	$result = $conn->query($query);
	$cart_items = $result->fetch_assoc();
	$items = json_decode($cart_items['items']);
	$shopping_cart_num_items = count($items);
}

if (isset($_SESSION['userid'])) {
	$user_id = $_SESSION['userid'];
	$user_sql = "SELECT * FROM users WHERE id = '$user_id'";
	$result = $conn->query($user_sql);
	$user = $result->fetch_assoc();
	$name = $user['name'];
}

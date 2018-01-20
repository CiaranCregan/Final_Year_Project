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
if (isset($_COOKIE[SHOPPING_CART_COOKIE])) {
	$shopping_cart_id = escape($_COOKIE[SHOPPING_CART_COOKIE]);
}
/*
Modify at a later stage in the shopping cart development
*/ 

if (isset($_SESSION['userid'])) {
	$user_id = $_SESSION['userid'];
	$user_sql = "SELECT * FROM users WHERE id = '$user_id'";
	$result = $conn->query($user_sql);
	$user = $result->fetch_assoc();
	$name = $user['name'];
}
//flashes go in here - add jquery to flash so it auto removes
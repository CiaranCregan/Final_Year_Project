<?php 
require_once 'core/init.php';
include 'includes/overall/a_header.php';
// $password = 'shoppingcartcookie';

// $password_hashed = password_hash($password, PASSWORD_DEFAULT);

// $path = $_SERVER['PHP_SELF'];

// echo $path . '<br>';

// echo $password_hashed . '<br>';

// echo dirname($_SERVER['PHP_SELF']);

// echo date('Y-m-d');
$yesterday = date('d.m.Y',strtotime("-1 days"));

echo $yesterday;

?>

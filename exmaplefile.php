<?php 
require_once 'core/init.php';
$password = 'shoppingcartcookie';

$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$path = $_SERVER['PHP_SELF'];

echo $path . '<br>';

echo $password_hashed . '<br>';

echo dirname($_SERVER['PHP_SELF']);

echo date('Y-m-d');

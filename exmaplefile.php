<?php 

$password = 'shoppingcartcookie';

$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$path = $_SERVER['PHP_SELF'];

echo $path;

echo $password_hashed;

echo dirname($_SERVER['PHP_SELF']);
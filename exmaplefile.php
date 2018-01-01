<?php 

$password = 'password';

$password_hashed = password_hash($password, PASSWORD_DEFAULT);

echo $password_hashed;

echo dirname($_SERVER['PHP_SELF']);
<?php

$dbServer = "localhost";
$dbName = "ooplr";
$dbUserName = "root";
$dbPassowrd = "";

$conn = @new mysqli("localhost", "root", "", "finalyearproject");

if ($conn->connect_error) {
	echo 'Error occured';
	die();
}
session_start();
include 'functions/user.php';
include 'functions/general.php';
include 'functions/sanitize.php';

if (isset($_SESSION['userid'])) {
	$user_id = $_SESSION['userid'];
	$user_sql = "SELECT * FROM users WHERE id = '$user_id'";
	$result = $conn->query($user_sql);
	$user = $result->fetch_assoc();
	$name = $user['name'];
}

//flashes go in here - add jquery to flash so it auto removes
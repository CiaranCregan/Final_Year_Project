<!DOCTYPE html>
<html lang="en">
	<?php include 'includes/head.php'; ?>
<body>
	<?php 
		if ($_SERVER['PHP_SELF'] == '/finalyearproject/login.php' || $_SERVER['PHP_SELF'] == '/finalyearproject/cart.php') {
			include 'includes/other_navbar.php';
		} else {
			include 'includes/navbar.php';
		}
	?>

<?php

function login($user_id) {
	$_SESSION['userid'] = $user_id;
	// insert global $conn;
	// add in last login date
	// success flash - create over at init.php

	header("Location: index.php");
}

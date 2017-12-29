<?php

function login($user_id) {
	$_SESSION['userid'] = $user_id;
	// insert global $conn;
	// add in last login date
	// success flash - create over at init.php

	header("Location: index.php");
}

function loggedin(){
	if (isset($_SESSION['userid']) && $_SESSION['userid'] > 0) {
		return true;
	}
	return false;
}

function employee_access($role = ''){
	global $user;
	$roles = explode(',', $user['roles']);
	if (in_array($role, $roles, true)) {
		return true;
	}
	return false;
}

function error_redirect($url = ''){
	header("Location: " . $url);
}


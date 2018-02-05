<?php

/* 
Note

Had to remove functions folder and place the general function within a folder called functions inside the core
folder. Once this was done the errors that I was facing where no longer.

Problem was arising because the system was looking for the functions folder within the relative.

*/

//input functions
function postInputexists(){
	return (!empty($_POST)) ? true : false;
}
function getInputExists(){
	return (!empty($_GET)) ? true : false;
}

// error functions
function brand_errors($branderrors){
	$display = '<div class="col-md-7">';
		foreach ($branderrors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

function product_errors($producterrors){
	$display = '<div class="col-md-12">';
		foreach ($producterrors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

function login_errors($loginerrors){
	$display = '<div class="col-md-6">';
		foreach ($loginerrors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

function errors($errors){
	$display = '<div class="col-md-12">';
		foreach ($errors as $error) {
			$display .= '
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							' . $error . '
						</div>
						';
		}					
	$display .= '</div>';
	return $display;
}

// Sanitize function
function escape($string) {
	return htmlentities($string, ENT_QUOTES, 'UTF-8');
}

// login functions
function login($user_id) {
	$_SESSION['userid'] = $user_id;
	// insert global $conn;
	// add in last login date

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
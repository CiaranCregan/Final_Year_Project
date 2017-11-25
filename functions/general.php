<?php

function postInputexists(){
	return (!empty($_POST)) ? true : false;
}
function getInputExists(){
	return (!empty($_GET)) ? true : false;
}

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
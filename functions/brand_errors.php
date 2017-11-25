<?php

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

function brand_success($brandSuccess){
	$display .= '<div class="col-md-7">';
			$display .= '
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Success</strong>.<a href="brands.php> View</a>
						</div>
						';					
	$display .= '</div>';
	return $display;
}

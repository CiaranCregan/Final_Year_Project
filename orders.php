<?php 

require_once 'core/init.php';
if (!loggedin()) {
	error_redirect('login.php');
}
if (!employee_access('employee')) {
	error_redirect('index.php');
} elseif (employee_access('driver')) {
	error_redirect('delivery.php');
}
include '/includes/overall/a_header.php'; 
?>
<div id="wrapper">
	
	<div id="main-wrapper">
		<?php 
		include 'includes/admin/orders/main.php';
		?>
	</div>
</div>
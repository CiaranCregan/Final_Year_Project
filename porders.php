<?php 

require_once 'core/init.php';
if (!loggedin()) {
	error_redirect('login.php');
}
if (!employee_access('employee')) {
	error_redirect('index.php');
} 
include '/includes/overall/a_header.php'; 
?>
<div id="wrapper">
	
	<div id="main-wrapper">
		<?php 
		include 'includes/admin/porders/main.php';
		?>
	</div>
</div>
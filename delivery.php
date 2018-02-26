<?php 

require_once 'core/init.php';
if (!loggedin()) {
	error_redirect('login.php');
}
if (!employee_access('employee')) {
	error_redirect('dashboard.php');
} 
include '/includes/overall/a_header.php'; 

?>
<div id="wrapper">
	
	<div id="main-wrapper">
		<h2>Hello World</h2>
	</div>

</div>
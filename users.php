<?php 

require_once 'core/init.php';
if (!loggedin()) {
	error_redirect('login.php');
}
if (!employee_access('admin')) {
	error_redirect('dashboard.php');
}
include '/includes/overall/a_header.php'; 

?>
<div id="wrapper">
	
	<div id="main-wrapper">
		<?php 
		// include 'includes/admin/b_nav.php';
		// include 'includes/admin/breadcrumb.php';
		include 'includes/admin/users/main.php';
		include 'includes/overall/a_footer.php';
		?>
	</div>

</div>
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
	
	<?php include 'includes/admin/sidebar.php'; ?>

	<div id="main-wrapper">
		<?php 
		include 'includes/admin/b_nav.php';
		include 'includes/admin/breadcrumb.php';
		include 'includes/admin/brands/main.php';
		include 'includes/overall/a_footer.php';
		?>
	</div>

</div>
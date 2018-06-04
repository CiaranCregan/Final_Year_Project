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
	// CODE BLOCK LINKED TO includes/admin/orders/main/vieworders.php
	$query = "SELECT * FROM payments WHERE status = 0 ORDER BY id DESC";
	$result = $conn->query($query);
	$demoDate = "2018-05-28";
	$deliveryDate = date('y:m:d', strtotime("+4 days"));
	// echo $demoDate;

	if (isset($_GET['addDelivery'])) {
		$id = (int)$_GET['addDelivery'];
		$conn->query("UPDATE payments SET status = 1, delivery_date = '$demoDate' WHERE id = '$id'");
		redirect('orders.php');
	}
	// END OF CODE BLOCK LINKED TO includes/admin/orders/main/vieworders.php

include '/includes/overall/a_header.php'; 
?>
<div id="wrapper">
	
	<div id="main-wrapper">
		<?php 
		include 'includes/admin/orders/main.php';
		include 'includes/overall/a_footer.php'
		?>
	</div>
</div>
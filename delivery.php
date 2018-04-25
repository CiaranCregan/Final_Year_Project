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
		<?php 
		// include 'includes/admin/b_nav.php';
		// include 'includes/admin/breadcrumb.php';
		include 'includes/admin/delivery/main.php';
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function orderdetails(id){ // id = id of product
    		// alert("Cart ID: " + id)
    		var orderData = {"id" : id};
    		$.ajax({
    			url 	: 'includes/orderdetails.php',
    			method 	: "post",
    			data 	: orderData,
    			success	: function(orderData){
    				jQuery("body").append(orderData);
    				jQuery("#order").modal('toggle');
    			},
    			error	: function(){
    				alert("Problem occurred");
    			}
    		});
    	}
		</script>
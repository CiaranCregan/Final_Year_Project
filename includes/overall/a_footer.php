 
<?php include 'includes/admin/footer.php'; ?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/e3c6915189.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">


		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});


var ctxOrder = document.getElementById("orderChart").getContext('2d');
var orderChart = new Chart(ctxOrder, {
    type: 'doughnut',
    data: {
        labels: ["New Orders (<?=newOrders();?>)", "Processed Orders (<?=viewedOrders();?>)", "Delivered Orders (<?=deliveredOrders();?>)"],
        datasets: [{
            data: [<?=newOrders();?>, <?=viewedOrders();?>, <?=deliveredOrders();?>],
            backgroundColor: [
                'rgba(255, 0, 0, 1)',
                'rgba(0, 255, 0, 1)',
                'rgba(0, 0, 255, 1)'
            ],
            borderWidth: 1
        }]
    }
});

function orderdetails(id){ // id = id of product
            // alert("Cart ID: " + id)
            var orderData = {"id" : id};
            $.ajax({
                url     : 'includes/orderdetails.php',
                method  : "post",
                data    : orderData,
                success : function(orderData){
                    jQuery("body").append(orderData);
                    jQuery("#order").modal('toggle');
                },
                error   : function(){
                    alert("Problem occurred");
                }
            });
        }

	</script>
</body>
</html>
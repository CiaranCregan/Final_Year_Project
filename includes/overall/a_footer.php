 
<?php include 'includes/admin/footer.php'; ?>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/e3c6915189.js"></script>
    <script type="text/javascript">
		$("#menu-toggle").click( function(e){
			e.preventDefault();
			$("#wrapper").toggleClass("menuDisplayed");
		});

	</script>
</body>
</html>
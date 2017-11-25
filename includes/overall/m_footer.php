 
<footer> 
    <nav class="navbar navbar-default navbar-static-bottom">
        <div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-center">
        <li><a href="#">&copy; Mattress Man Corporation 2017. All rights reserved.</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</footer> 

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	function featuredetails(id){ // id = id of product
    		// alert("Product Number: " + id)
    		var featuredData = {"id" : id};
    		jQuery.ajax({
    			url 	: 'includes/featureddetails.php',
    			method 	: "post",
    			data 	: featuredData,
    			success	: function(featuredData){
    				jQuery("body").append(featuredData);
    				jQuery("#details").modal('toggle');
    			},
    			error	: function(){
    				alert("Problem occurred");
    			}
    		});
    	}
    </script> 

    <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

</script>
</body>
</html>
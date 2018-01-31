 
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
    <script src="https://use.fontawesome.com/e3c6915189.js"></script>
    <script type="text/javascript">
      // MODAL FUNCTION FOR EACH FEATURED PRODUCT
    	function featuredetails(id){ // id = id of product
    		// alert("Product Number: " + id)
    		var featuredData = {"id" : id};
    		$.ajax({
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

      // ADDING TO CART FUCNTION
      function save_to_cart(){
        $('#errors').html("");
        var quantity = $('#quantity').val();
        var error = '';
        var data = $('#add_to_cart').serialize();
        //alert(data);

        if (quantity == '') {
          error += '<p class="text-danger text-center">You must select a quantity.</p>';
          $('#errors').html(error);
          return;
        } else {
          //alert("Everything is good to go Ciaran");
          $.ajax({
            url: 'includes/added_to_cart.php',
            method: 'post',
            data: data,
            success: function(){
              location.reload();
            },
            error: function(){
              alert("Oh no, it looks like something has when wrong...")
            }
          });
        }
      }

            // CAROUSEL FUNCTION, HOME PAGE
      // var slideIndex = 1;
      //   showSlides(slideIndex);
      //   function plusSlides(n) {
      //     showSlides(slideIndex += n);
      //   }
      //   function currentSlide(n) {
      //     showSlides(slideIndex = n);
      //   }
      //   function showSlides(n) {
      //     var i;
      //     var slides = document.getElementsByClassName("mySlides");
      //     var dots = document.getElementsByClassName("dot");
      //     if (n > slides.length) {slideIndex = 1}    
      //     if (n < 1) {slideIndex = slides.length}
      //     for (i = 0; i < slides.length; i++) {
      //         slides[i].style.display = "none";  
      //     }
      //     for (i = 0; i < dots.length; i++) {
      //         dots[i].className = dots[i].className.replace(" active", "");
      //     }
      //     slides[slideIndex-1].style.display = "block";  
      //     dots[slideIndex-1].className += " active";
      //   }
      //   setTimeout(function(){
      //     $('#item-added-successfully').fadeOut("slow").empty();
      //   }, 5000);
    </script> 
</body>
</html>
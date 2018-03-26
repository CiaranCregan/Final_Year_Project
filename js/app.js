// INDEX PAGE JAVASCRIPT

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
        var side = $('#side').val();
        var color = $('#color').val();
        //alert(quantity + side + color);
        var error = '';
        var data = $('#add_to_cart').serialize();
        // alert(data);

        if (quantity == '') {
          error += '<p class="text-danger text-center">You must provide a quantity.</p>';
          $('#errors').html(error);
          return;
        } else if(side == '') {
          error += '<p class="text-danger text-center">You must provide a side for storage.</p>';
          $('#errors').html(error);
          return;
        } else if(color == ''){
          error += '<p class="text-danger text-center">You must provide a base colour.</p>';
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
              alert("Oh no, it looks like something has when wrong...");
            }
          });
        }
      }

      function cart_update(mode, id, side, color){
        var data = {"mode" : mode, "id" : id, "side" : side, "color" : color};
        //console.log(data);
        $.ajax({
            url: 'includes/cart-update.php',
            method: 'post',
            data: data,
            success: function(){
              location.reload();
            },
            error: function(){
              alert("Oh no, it looks like something has when wrong...");
            }
          });
      }

  // CHECKOUT PAGE JAVASCRIPT
          // Create a Stripe client
  var stripe = Stripe('pk_test_G6n6afCBeOt85e3qsTNcRfm2');

  // Create an instance of Elements
  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)
  var style = {
    base: {
      color: '#32325d',
      lineHeight: '18px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
  };

  // Create an instance of the card Element
  var card = elements.create('card', {style: style});

  // Add an instance of the card Element into the `card-element` <div>
  card.mount('#card-element');

  // Handle real-time validation errors from the card Element.
  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
  }

  // Handle form submission
  var form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server
        stripeTokenHandler(result.token);
      }
    });
  });

  // CUSTOMER ORDER HISTORY JAVASCRIPT
  
  function customerOrderHistory(id){ // id = id of product
        // alert("Cart ID: " + id)
        var orderData = {"id" : id};
        $.ajax({
          url   : 'includes/orderhistory.php',
          method  : "post",
          data  : orderData,
          success : function(orderData){
            jQuery("body").append(orderData);
            jQuery("#order").modal('toggle');
          },
          error : function(){
            alert("Problem occurred");
          }
        });
      }
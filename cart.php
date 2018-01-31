<?php 
   require_once 'core/init.php';
   include 'includes/overall/m_header.php';

   $item_quantity = $_POST['quantity'];
   $total = $_POST['total'];
?>
<div class="container" style="margin-top: 40px;">
    <h1 class="text-center">Checkout</h1>
    <div class="row" style="margin-top: 40px;">
      <!-- <div class="col-md-4">
        <div class="panel panel-default">
		  <div class="panel-heading">Item Amounts</div>
		  <div class="panel-body">
		    <h3>Item Quantity: <= $item_quantity; ?> items</h3>
		    <h3>Item Total: £<= $total; ?></h3>
		  </div>
		</div>
      </div> -->
      <div class="col-md-6 col-md-offset-3">
      	<div class="errors"></div>
      	<div id="shipping" class="panel panel-default">
		  <div class="panel-heading"><h1 id="heading">Account Information</h1></div>
		  <div class="panel-body">
		    <form id="payment-form" action="success.php" method="post">
		    	<input type="hidden" name="id" value="<?= $shopping_cart_id;?>">
		    	<input type="hidden" name="items" value="<?= $item_quantity;?>">
		    	<input type="hidden" name="total" value="<?= $total;?>">
		    		<div class="form-group">
					    <label for="fullname">Full name</label>
					    <input name="full_name" type="text" class="form-control" id="fullname" placeholder="John Doe">
					</div>
					<div class="form-group">
					    <label for="email">Email</label>
					    <input name="email_address" type="email" class="form-control" id="address" placeholder="johndoe@example.com">
					</div>
					<div class="form-group">
					    <label for="address">Street Address</label>
					    <input name="address" type="text" class="form-control" id="address" placeholder="John Doe lane 45">
					</div>
					<div class="form-group">
					    <label for="city">City</label>
					    <input name="city" type="text" class="form-control" id="city" placeholder="Belfast">
					</div>
					<div class="form-group">
					    <label for="county">County</label>
					    <input name="county" type="text" class="form-control" id="county" placeholder="Antrim">
					</div>
					<div class="form-group">
					    <label for="postcode">Postcode</label>
					    <input name="postcode" type="text" class="form-control" id="postcode" placeholder="BT17 0UT">
					</div>
					<div class="form-group">
					    <label for="card-element">
					      <h3>Credit or debit card</h3>
					    </label>
					    <div id="card-element">
					      <!-- a Stripe Element will be inserted here. -->
					    </div>
					</div>
					<div id="card-errors" class="text-danger text-center" role="alert"></div>
		    	<input type="submit" class="btn btn-warning pull-right" id="payment" value="Secure Checkout">
		    </form>
		  </div>
		</div>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script type="text/javascript">

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
  </script>
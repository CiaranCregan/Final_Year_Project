<?php 
   require_once 'core/init.php';
   if (!loggedin()) {
		error_redirect('basket.php');
	}
   include 'includes/overall/m_header.php';

  if (postInputExists()) {
   $item_quantity = $_POST['quantity'];
   $total = $_POST['total'];

   $validation = array('quantity', 'total');
				foreach ($validation as $validate) {
					if ($_POST[$validate] == 0) {
						header("Location: basket.php");
					}
				}
  }
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
		  <div class="panel-heading"><h1 id="heading">Account Information (4000008260000000)</h1></div>
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

  <?php include 'includes/overall/m_footer.php'; ?>
  
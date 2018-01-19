<?php 
   require_once 'core/init.php';
   include 'includes/overall/m_header.php';

   $item_quantity = $_POST['quantity'];
   $total = $_POST['total'];
?>
<div class="container" style="margin-top: 40px;">
    <h1 class="text-center">Checkout</h1>
    <div class="row" style="margin-top: 40px;">
      <div class="col-md-4">
        <div class="panel panel-default">
		  <div class="panel-heading">Item Amounts</div>
		  <div class="panel-body">
		    <h3>Item Quantity: <?= $item_quantity; ?> items</h3>
		    <h3>Item Total: £<?= $total; ?></h3>
		  </div>
		</div>
      </div>
      <div class="col-md-8">
      	<div class="errors"></div>
      	<div id="shipping" class="panel panel-default">
		  <div class="panel-heading"><h1>Shipping Address</h1></div>
		  <div class="panel-body">
		    <form id="shipping-details">
			  <div class="form-group">
			    <label for="name">Full Name</label>
			    <input type="text" class="form-control" id="name" placeholder="John Doe">
			  </div>
			  <div class="form-group">
			    <label for="Email">Email</label>
			    <input type="text" class="form-control" id="Email" placeholder="example@hotmail.co.uk">
			  </div>
			  <div class="form-group">
			    <label for="address">Address</label>
			    <input type="text" class="form-control" id="address" placeholder="123 Street Address">
			  </div>
			  <div class="form-group">
			    <label for="city">City</label>
			    <input type="text" class="form-control" id="city" placeholder="Belfast">
			  </div>
			  <div class="form-group">
			    <label for="county">County</label>
			    <input type="text" class="form-control" id="county" placeholder="Antrim">
			  </div>
			  <div class="form-group">
			    <label for="postcode">Post Code</label>
			    <input type="text" class="form-control" id="postcode" placeholder="BT17 0UT">
			  </div>
			  <button type="submit" class="btn btn-primary pull-right" onclick="next();">Step 2 >></button>
			</form>
		  </div>
		</div>
      	<div id="card" class="panel panel-default">
		  <div class="panel-heading"><h1>Card Details</h1></div>
		  <div class="panel-body">
		    <form id="card-details">
			  <div class="form-group">
			    <label for="cardname">Card Name: </label>
			    <input type="text" class="form-control" id="cardname" placeholder="John Doe">
			  </div>
			  <div class="form-group">
			    <label for="cardnumber">Card Number: </label>
			    <input type="text" class="form-control" id="cardnumber" placeholder="John Doe">
			  </div>
			  <div class="form-group">
			    <label for="cvc">CVC: </label>
			    <input type="password" class="form-control" id="cvc" placeholder="John Doe">
			  </div>
			  <div class="form-group">
			  	<label>Expiry Month: </label>
			    <select class="form-control" id="exMonth">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				</select>
			  </div>
			  <div class="form-group">
			  	<label>Expiry Year: </label>
			    <select class="form-control" id="exYear">
				  <option>1</option>
				  <option>2</option>
				  <option>3</option>
				  <option>4</option>
				  <option>5</option>
				</select>
			  </div>
			  <button type="submit" class="btn btn-primary" onclick="back();"><< Step 1</button>
			  <button type="submit" class="btn btn-primary pull-right">Submit</button>
			</form>
		  </div>
		</div>
      </div>
    </div>
  </div>

  <?php include 'includes/overall/m_footer.php'; ?>


  <script type="">

  	//$('#card').hide();

  	function back(){
  		$('#shipping').show('slow');
  		$('#card').hide('slow');
  	}

  	function next(){
  		$('#shipping').hide('slow');
  		$('#card').show('slow');
  	}

  </script>

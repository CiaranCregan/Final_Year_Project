<?php
	require_once 'core/init.php';

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey(SECRET_KEY);

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$token = $_POST['stripeToken'];

	// My form post data varaiables 
	$fullname = $_POST['full_name'];
	$email = $_POST['email_address'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$county = $_POST['county'];
	$postcode = $_POST['postcode'];
	$cart_id = $_POST['id'];
	$item_quantity = $_POST['items'];
	$total = $_POST['total'] * 100;
	$grand_total = $total;
	$metadata = array(
		"cart_id" => $cart_id,
		"total" => $total,
		"fullname" => $fullname,
	);

	// echo $item_quantity;

	// Charge the user's card:
	try {
		$charge = \Stripe\Charge::create(array(
		  "amount" 		=> $grand_total,
		  "currency"	=> "gbp",
		  "description" => $item_quantity . " item(s) have been purchased via Mattress Man",
		  "source" 		=> $token,
		  "metadata" => $metadata
 		));

 		$query = "UPDATE shopping_cart SET purchased = 1 WHERE id = '$cart_id'";
 		$conn->query($query);
 		setcookie(SHOPPING_CART_COOKIE,'',1,'/',false);
 		header("Location: index.php");
	} catch (Exception $e) {
		echo $e; // Develop further and make it nicer than just simply outputting $e;
	}
?>
<?php 
  require_once 'core/init.php';
  include 'includes/overall/m_header.php';

  $cart = "SELECT * FROM shopping_cart WHERE id = '$shopping_cart_id'";
  $result = $conn->query($cart);
  $cart_items = $result->fetch_assoc();
  $items = json_decode($cart_items['items'], true);
  $items_quantity = 0;
  $total = 0;

  //$path = $_SERVER['PHP_SELF'];
?>
<div class="col-md-12">
  <div class="row" style="background-color: #e6e6e6;">
    <h3 class="text-center">
      Better move fast before your items sell out!
    </h3>
  </div>
  <div class="container" style="margin-top: 40px;">
    <h1 class="text-center">My Shopping Bag</h1>
    <div class="row" style="margin-top: 40px;">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table">
            <?php
            if ($shopping_cart_id == '') {
               echo "<h2>There are no items within your basket.</h2>";
            } else {
              foreach ($items as $an_item) {
              $id = $an_item['id'];
              $product = "SELECT * FROM products WHERE id = '$id'";
              $result = $conn->query($product);
              $product_info = $result->fetch_assoc();
            ?>
            <tr>
              <td><img src="<?= $product_info['image'] ;?>"></td>
              <td>
                <h4>
                  <?= $product_info['title'];?>
                </h4>
                <p class="list-price text-danger">Was: £<?= $product_info['price'];?>.00</p>
                <p class="text-success">Now: £<?= $product_info['our_price'];?>.00</p>
              </td>
              <td><h4>Size: <br>Single</h4></td>
              <td class="text-center" style="width:200px;">
                <h4>Quantity:</h4><br>
                <a href="#" class="btn btn-default"><i class="fa fa-minus" aria-hidden="true"></i></a>
                <a href="#" class="btn btn-default" disabled><?= $an_item['quantity'];?></a>
                <a href="#" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i></a>
              </td>
              <td><h4>Price: <br>£<?= $product_info['our_price'];?>.00</h4></td>
              <td><h4>TBC</h4></td>
            </tr>
            <?php 
              $items_quantity += $an_item['quantity'];
              $total += ($product_info['our_price'] * $an_item['quantity']);
            }
            }?>
          </table>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-12">
        <a href="index.php" class="btn btn-default btn-lg"><i class="fa fa-arrow-left" aria-hidden="true"></i>
 Continue Shopping</a>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <form method="post" action="cart.php">
          <input type="hidden" name="quantity" value="<?= $items_quantity; ?>">
          <input type="hidden" name="total" value="<?= $total; ?>">
          <input class="btn btn-warning btn-lg" type="submit" name="submit" value="Secure Checkout">
        <h4>Item Quantity: <?= $items_quantity; ?></h4>
        <h4>Total: £<b><?= $total; ?>.00</b><br>
          <p>(Delivery Excluded)</p>
        </h4>
        </form>
      </div>
    </div>
  </div>
</div> 

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/e3c6915189.js"></script>
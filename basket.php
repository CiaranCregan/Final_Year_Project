<?php 
  require_once 'core/init.php';
  include 'includes/overall/m_header.php';

  $cart = "SELECT * FROM shopping_cart WHERE id = '$shopping_cart_id'";
  $result = $conn->query($cart);
  $cart_items = $result->fetch_assoc();
  $items = json_decode($cart_items['items'], true);
  $items_quantity = 0;
  $total = 0;
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
            foreach ($items as $an_item) {
              $id = $an_item['id'];
              $product = "SELECT * FROM products WHERE id = '$id'";
              $result = $conn->query($product);
              $product_info = $result->fetch_assoc();
            ?>
            <tr>
              <td><img src="<?= $product_info['image'] ;?>" class="img-thumbnail" style="width:200px;"></td>
              <td>
                <h4>
                  <?= $product_info['title'];?>
                </h4>
                <p class="list-price text-danger">Was: £<?= $product_info['price'];?>.00</p>
                <p class="text-success">Now: £<?= $product_info['our_price'];?>.00</p>
              </td>
              <td><h4>Size: <br>TBC</h4></td>
              <td><h4>Quantity: <br><?= $an_item['quantity'];?></h4></td>
              <td><h4>Price: <br>£<?= $product_info['our_price'];?>.00</h4></td>
              <td><h4>TBC</h4></td>
            </tr>
            <?php 
              $items_quantity += $an_item['quantity'];
              $total += ($product_info['our_price'] * $an_item['quantity']);
            } ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top: 40px;">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-6">
        <button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-arrow-left"></span> Continue Shopping</button>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6">
        <button type="button" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Secure Checkout</button>
        <h4>Item Quantity: <?= $items_quantity; ?></h4>
        <h4>Total: £<b><?= $total; ?>.00</b><br>
          <p>(Delivery Excluded)</p>
        </h4>
      </div>
    </div>
  </div>
</div>



    

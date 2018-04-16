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
  <section id="basket-items">
    <div class="container" style="margin-top: 40px;">
    <h1 class="text-center">My Shopping Bag || <?=$cart_items['id'];?></h1>
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
              <td><img class="" src="<?= $product_info['image'] ;?>" width="100%" height="120px"></td>
              <td>
                <h4>
                  <?= $product_info['title'];?>
                </h4>
                <p class="list-price text-danger">Was: £<?= $product_info['price'];?>.00</p>
                <p class="text-success">Now: £<?= $product_info['our_price'];?>.00</p>
              </td>
              <td><h4>Size: <br><?= $product_info['size'] ;?></h4></td>
              <td class="text-center" style="width:200px;">
                <h4>Quantity:</h4><br>
                <button class="btn btn-danger" onclick="cart_update('minus','<?= $product_info['id'];?>','<?= $an_item['side'];?>','<?= $an_item['color'];?>');">-</button>
                <a href="#" class="btn btn-default" disabled><?= $an_item['quantity'];?></a>
                <?php if ($an_item['quantity'] < $product_info['stock']) : ?>
                <button class="btn btn-success" onclick="cart_update('add','<?= $product_info['id'];?>','<?= $an_item['side'];?>','<?= $an_item['color'];?>');">+</button>
                <?php endif; ?>
              </td>
              <td><h4>Price: <br>£<?= $product_info['our_price'];?>.00</h4></td>
              <td><h4>Storage: <br><?= (($an_item['side'] == '')?'None':$an_item['side']);?></h4></td>
              <td><h4>Base Colour: <?= $an_item['color'];?></h4></td>
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
          <?php if (loggedin()) {
            # code...
            echo '<input class="btn btn-success btn-lg" type="submit" name="submit" value="Secure Checkout" '.(($items_quantity == 0 && $total == 0)?"disabled":"").'>';
          } ?>
        <h4>Item Quantity: <?= $items_quantity; ?></h4>
        <h4>Total: £<b><?= $total; ?>.00</b><br>
          <p>(Delivery Excluded)</p>
        </h4>
        </form>
      </div>
    </div>
  </div>
  </section>
</div> 
<?php include 'includes/overall/m_footer.php'; ?>
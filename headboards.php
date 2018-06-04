<?php 

    // https://www.egrappler.com/edmin/index.html
    require_once 'core/init.php';
    include 'includes/overall/m_header.php';

    $sql = "SELECT * FROM  products WHERE archived != 1 AND type = 'headboards'";
    $result = $conn->query($sql);
?>
    <div class="jumbotron">
      <div class="container text-center">
          <h2 class="primary-color">Welcome to The Mattress Man Belfast</h2>
          <a href="beds.php" class="btn btn-info">View all Beds</a>
          <a href="mattresses.php" class="btn btn-info">View all Mattresses</a>
          <a href="#" class="btn btn-info">View all Headboards</a>
      </div>
    </div>
    
    <section id="beds">
      <div class="container">
        <div class="col-md-12">
          <h2 class="text-center">Headboards</h2>
          <?php
          if (isset($_SESSION['success-message-index'])) {
            echo '
            <div class="col-md-12" id="item-added-successfully">
            <div class="row">
            <div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" ria-label="Close"><span aria-hidden= true>&times;</span></button>
             <strong>Product Added to you Cart!</strong> '.$_SESSION['success-message-index'].'
             </div>
             </div>
             </div>';
            unset($_SESSION['success-message-index']);
          }
          ?>
          <?php while ($pro = $result->fetch_assoc()) : ?>
          <div class="col-md-3 col-sm-3 col-xs-12" style="padding-bottom: 10px;height: 100%;">
            <img src="<?= $pro['image']; ?>" alt="<?= $pro['title']; ?>" class="img-thumb">
            <h4 class="text-center"><?= $pro['title']; ?></h4>
            <h4 class="text-center"><b><?=(($pro['storage'] == 0)?'without Drawers':'with Drawers');?></b></h4>
            <h4 class="text-center"><?= $pro['size']; ?> Bed</h4>
            <div class="content text-center">
              <!-- <p class="list-price text-danger">£<?= $pro['price']; ?></p> -->
              <h3 style="color: green;">Price: £<?= $pro['our_price']; ?></h3>
            </div>
            <button type="button" class="btn btn-main btn-block" onclick="featuredetails(<?= $pro['id']; ?>)">View product</button>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php include 'includes/overall/m_footer.php'; ?>
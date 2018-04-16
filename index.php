    <?php 

    // https://www.egrappler.com/edmin/index.html
    require_once 'core/init.php';
    include 'includes/overall/m_header.php';
    ?>
    <div class="jumbotron">
      <div class="container text-center">
          <h2 class="primary-color">Welcome to The Mattress Man Belfast</h2>
          <a href="beds.php" class="btn btn-info">View all Beds</a>
          <a href="mattresses.php" class="btn btn-info">View all Mattresses</a>
          <a href="#" class="btn btn-info">View all Headboards</a>
      </div>
    </div>
    <section id="our-brands">
      <div class="container">
        <h1 class="text-center primary-color">Mattress Man Products</h1>
        <h3 class="text-center">Our customers are the most important people and because of that we try and find the best sleeping experience.</h3>
        <?php include 'includes/index/our-brands.php'; ?>
      </div>
    </section>  
    <div class="container-fluid">
      <?php
          if (isset($_SESSION['success-message-index'])) {
            echo '
            <div class="col-md-12" id="item-added-successfully">
            <div class="row">
            <div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" ria-label="Close"><span aria-hidden= true>&times;</span></button>
             <strong>Complete!</strong> '.$_SESSION['success-message-index'].'
             </div>
             </div>
             </div>';
            unset($_SESSION['success-message-index']);
          }
          ?>
      <div class="col-md-12">
        <div class="row">
          <h2 class="text-center primary-color">Best Sellers</h2>
          <hr>
          <?php include 'featured.php'; ?>
        </div>
      </div>
    </div>
<?php include 'includes/overall/m_footer.php'; ?>
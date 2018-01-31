    <?php 
    require_once 'core/init.php';
    include 'includes/overall/m_header.php';
    ?>
    <div class="jumbotron">
      <div class="container text-center">
        <h2 class="primary-color">Welcome to The Mattress Man Belfast</h2>
        <p><a class="btn btn-default btn-lg" href="#" role="button">Learn more</a></p>
      </div>
    </div>

    <!-- <div class="slideshow-container">
        <div class="mySlides">
          <div class="numbertext">1 / 4</div>
          <img src="img/hero-1.jpg" style="width:100%;">
          <div class="text">
          <h1>Massive Savings - Get up to 1/2 Price off all beds now</h1>
          </div>
        </div>

        <div class="mySlides">
          <div class="numbertext">2 / 4</div>
          <img src="img/hero-img.jpg" style="width:100%;">
          <div class="text"><h1>The Mattress Man look</h1></div>
        </div>

        <div class="mySlides">
          <div class="numbertext">3 / 4</div>
          <img src="img/example.jpg" style="width:100%">
          <div class="text">Caption Three</div>
        </div>

        <div class="mySlides">
          <div class="numbertext">4 / 4</div>
          <img src="img/image1.jpg" style="width:100%">
          <div class="text">Caption Four</div>
        </div>

        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span>
          <span class="dot" onclick="currentSlide(2)"></span>
          <span class="dot" onclick="currentSlide(3)"></span>
          <span class="dot" onclick="currentSlide(4)"></span>
        </div>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div> -->

    <div class="container-fluid">
      <?php
          if (isset($_SESSION['success-message-flash'])) {
            echo '
            <div class="col-md-12" id="item-added-successfully">
            <div class="row">
            <div class="alert alert-success alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" ria-label="Close"><span aria-hidden= true>&times;</span></button>
             <strong>Complete!</strong> '.$_SESSION['success-message-flash'].'
             </div>
             </div>
             </div>';
            unset($_SESSION['success-message-flash']);
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
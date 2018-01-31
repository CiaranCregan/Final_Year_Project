    <?php 
    require_once 'core/init.php';
    include 'includes/overall/m_header.php';
    ?>
    <div class="jumbotron">
      <div class="container text-center">
          <h2 class="primary-color">Welcome to The Mattress Man Belfast</h2>
          <!-- <a href="#" class="btn btn-default">View all Beds</a>
          <a href="#" class="btn btn-default">View all Mattresses</a>
          <a href="#" class="btn btn-default">View all Headboards</a> -->
      </div>
    </div>
    <section id="our-brands">
      <div class="container">
      <h1 class="text-center primary-color">Mattress Man Products</h1>
      <h3 class="text-center">Our customers are the most important people and because of that we try and find the best sleeping experience.</h3>
      <div class="col-md-4">
        <div class="row">
          <div class="panel panel-default">
            <div id="m-color" class="panel-heading">
              <img src="img/bed2.jpg" style="width: 100%">
            </div>
            <div class="panel-body" style="background-color: #ffb100;color: #fff;">
                <div class="text-center">
                  <h2>Divan Beds</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
             </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="panel panel-default">
            <div id="m-color" class="panel-heading">
              <img src="img/bed3.jpg" style="width: 100%">
            </div>
            <div class="panel-body" style="background-color: #aee0c5;color: #fff;">
                <div class="text-center">
                  <h2>Wingback Beds</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
             </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row">
          <div class="panel panel-default">
            <div id="m-color" class="panel-heading">
              <img src="img/bed4.jpg" style="width: 100%">
            </div>
            <div class="panel-body" style="background-color: #ead5e1;color: #fff;">
                <div class="text-center">
                  <h2>Paris Beds</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
             </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    
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
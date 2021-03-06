<?php 
require_once 'core/init.php';
?>
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Mattress Man</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="beds.php">Beds</a>
          <li><a href="mattresses.php">Mattresses</a></li>
          <li><a href="#">Headboards</a></li>
          <!--li><a href="#"></a></li-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <form class="navbar-form navbar-left" action="search.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search Product" name="search" value="<?=((isset($_POST['search']))?$_POST['search']:'');?>">
            <input type="submit" value="Search Products" class="btn btn-success">
          </div>
        </form>
          <li><a href="basket.php"><span class="glyphicon glyphicon-shopping-cart"></span> Basket <?= (($shopping_cart_num_items > 0)?'<span class="badge">'.$shopping_cart_num_items.'</span>':'') ?></a></li>
          <?php
            if (!loggedin()) {
              echo '<li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>';
            } else {
              echo '
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome<b> ';
              echo $name;
              echo '</b> <span class="caret"> </span></a>
                  <ul class="dropdown-menu">';
                    if (employee_access('employee')) {
                      echo '<li><a href="dashboard.php">Admin Area</a></li>';
                    }
                    echo '<li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>';
            }
          ?>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav> 
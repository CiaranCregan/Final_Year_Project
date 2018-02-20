<?php 
  require_once 'core/init.php';
?>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand text-center" href="index.php"><h1>Mattress Man</h1></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a></li>
        <li><a href="brands.php">Brands</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="archived.php">Archived</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Delivery</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orders<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="orders.php">View Orders</a></li>
            <li><a href="porders.php">View Processed Orders</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome<b> <?= $name; ?></b> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> View My Profile</a></li>
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Visit Site</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

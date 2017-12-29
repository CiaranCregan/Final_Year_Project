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
      <a href="#" class="navbar-brand" id="menu-toggle"><span class="glyphicon glyphicon-triangle-right"></span> </a>
      <a class="navbar-brand text-center" href="index.php">The Mattress Man</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a></li>
        <li><a href="brands.php">Brands</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="users.php">Users</a></li>
        <li><a href="archived.php">Archived</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome<b> <?= $name; ?></b> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Visit Site</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

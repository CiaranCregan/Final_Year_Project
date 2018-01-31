<?php 
    require_once 'core/init.php';
    if (!loggedin()) {
	error_redirect('login.php');
	}
    include 'includes/overall/m_header.php';
?>
<div class="container">
  <h2 class="primary-color">Welcome, <?= $name;?></h2>
  <hr>
  <section id="user-accounts" style="padding-top: 20px;">
    <div class="col-md-4">
      <div class="panel panel-default">
            <div class="panel-heading text-center">
              <a href="#">
                <i class="fa fa-cog" aria-hidden="true" style="font-size: 80px;padding: 10px;color: #fff"></i>
              <h3>Account Settings</h3>
              </a>
            </div>
      </div>
    </div>
    <?php
      if (!employee_access('employee')) {
         echo '
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <a href="#">
                  <i class="fa fa-history" aria-hidden="true" style="font-size: 80px;padding: 10px;color: #fff"></i>
                  <h3>Order History</h3>
                </a>
              </div>
            </div>
          </div>
         ';
       } else {
          echo '
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
                <a href="dashboard.php">
                  <i class="fa fa-lock" aria-hidden="true" style="font-size: 80px;padding: 10px;color: #fff"></i>
                  <h3>View Admin Area</h3>
                </a>
              </div>
            </div>
          </div>
         ';
       }
    ?>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <a href="logout.php">
            <i class="fa fa-sign-out" aria-hidden="true" style="font-size: 80px;padding: 10px;color: #fff"></i>
            <h3>Sign Out</h3>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/e3c6915189.js"></script>
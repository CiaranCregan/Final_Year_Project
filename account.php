<?php 
    require_once 'core/init.php';
    if (!loggedin()) {
  	 error_redirect('login.php');
  	}
    include 'includes/overall/m_header.php';

    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
?>
<div class="container">
  <a href="profile.php" class="btn btn-default" style="margin-top: 20px;"> << Return to My Profile</a>
  <h2 class="primary-color">Welcome, <?= $name;?></h2>
  <hr>
  <section id="account" style="padding-top: 20px;">
    <div class="row">
      <div class="col-md-12">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="primary-color">Personal Details</h3>
              </div>
              <div class="panel-body">
                <div style="padding-left: 75px;">
                    <p><b>Customer Name</b> <br><?=$user['name'];?></p>
                    <p><b>Customer Contact Phone Number</b> <br><?=$user['number'];?></p>
                    <p><b>Customer Email Address</b> <br><?=$user['email'];?></p>
                </div>
              </div>
            </div> 
          </div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="primary-color">Address Details</h3>
              </div>
              <div class="panel-body">
                <div style="padding-left: 75px;">
                  <p><b>Customer Email Address</b></p>
                    <address>
                      <?= $user['address'] ;?>,<br> 
                      <?= $user['postcode'] ;?>,<br>
                      <?= $user['county'] ;?><br>
                    </address>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
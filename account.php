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

      </div>
    </div>
  </section>
</div>
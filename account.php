<?php 
    require_once 'core/init.php';
    if (!loggedin()) {
  	 error_redirect('login.php');
  	}
    include 'includes/overall/m_header.php';

    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    if (isset($_GET['edit'])) {

      $editId = (int)$_GET['edit'];

      $customerName = ((isset($_POST['name']) && !empty($_POST['name']))?escape($_POST['name']):$user['name']);
      $customerAddress = ((isset($_POST['address']) && !empty($_POST['address']))?escape($_POST['address']):$user['address']);
      $customerCounty = ((isset($_POST['county']) && !empty($_POST['county']))?escape($_POST['county']):$user['county']);
      $customerPostcode = ((isset($_POST['postcode']) && !empty($_POST['postcode']))?escape($_POST['postcode']):$user['postcode']);
      $customerEmail = ((isset($_POST['email']) && !empty($_POST['email']))?escape($_POST['email']):$user['email']);
      $customerUsername = ((isset($_POST['username']) && !empty($_POST['username']))?escape($_POST['username']):$user['username']);

      if (postInputExists()) {
          if (isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token']) {

            $updateErrors = '';

            // foreach loop that will run through all the posted variable to check for errors
              $required = array('name','address','county','postcode','email','username');
              foreach ($required as $require) {
                if ($_POST[$require] == '') {
                  $updateErrors[] .= 'All fields marked with * must been filled.';
                  break;
                }
              }

              // if errors not empty then it will display the in div 9 column with appriopiate error message
            if (!empty($updateErrors)) {
              echo errors($updateErrors);
            } else {
              $query = "UPDATE users SET name = '$customerName', address = '$customerAddress', county = '$customerCounty', postcode = '$customerPostcode', email = '$customerEmail', username = '$customerUsername' WHERE id = '$editId'";
              $result = $conn->query($query);
              $_SESSION['success-message-flash'] = 'Your details have been updated';
              header("Location: account.php");
            }
          }
      }

      $token = $_SESSION['token'] = md5(uniqid());

      echo 
       '
       <div class="container" style="padding-top: 20px;">
                <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <div id="m-color" class="panel-heading">
                 <h3 class="panel-title">Edit Customer Details</h3>
                 '.$token.'
              </div>
              <div class="panel-body table-responsive">

                <div class="col-md-6 col-md-offset-3"></div>
                <form action="account.php?edit='.$user_id.'" method="post">
                  <div class="form-group col-md-12">
                    <label for="name">Customer Name*:</label>
                    <input class="form-control" type="text" name="name" id="name" value="'.$customerName.'">
                  </div><br>
                  <div class="form-group col-md-12">
                    <label for="address"> Customer Address*:</label>
                    <input class="form-control" type="text" name="address" id="address" value="'.$customerAddress.'">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="county">Customer County*:</label>
                    <input class="form-control" type="text" name="county" id="county" value="'.$customerCounty.'">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="postcode">Customer Postcode*:</label>
                    <input class="form-control" type="text" name="postcode" id="postcode" value="'.$customerPostcode.'">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="email">Customer Email*:</label>
                    <input class="form-control" type="text" name="email" id="email" value="'.$customerEmail.'">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="username">Customer Username*:</label>
                    <input class="form-control" type="text" name="username" id="username" value="'.$customerUsername.'">
                  </div>
                  <div class="form-group col-md-12">
                    <a href="account.php" class="btn btn-danger">Cancel</a>
                    <input type="hidden" name="token" value="'.$token.'">
                    <input type="submit" class="btn btn-success pull-right" value="Edit Customer Information">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
       ';
    } else {
      echo 
      '
        <div class="container">
  <a href="profile.php" class="btn btn-default" style="margin-top: 20px;"> << Return to My Profile</a>
  <h2 class="primary-color">Welcome, '.$name.'</h2>
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
                    <p><b>Customer Username</b> <br>'.$user['username'].'</p>
                    <p><b>Customer Contact Phone Number</b> <br>'.$user['number'].'</p>
                    <p><b>Customer Email Address</b> <br>'.$user['email'].'</p>
                </div>
                <a href="account.php?edit='.$user_id.'" class="btn btn-default">Edit Details</a>
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
                  <p><b>Customer Address</b></p>
                    <address>
                      '.$user['address'].',<br> 
                      '.$user['postcode'].',<br>
                      '.$user['county'].'<br>
                    </address>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
</div>
      ';
    }
?>

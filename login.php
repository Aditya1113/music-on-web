<?php
//include the code from database.php
require_once('includes/database.php');

$username = '';
$password = '';
$login_status = '';

if ( isset($_POST['username']) )
    $username = trim($_POST['username']);
if ( isset($_POST['password']) )
    $password = trim($_POST['password']);

if (!empty($username)) {
    //The SQL select statement
    $query_stry = "SELECT * FROM users WHERE user_name='$username' AND user_password='$password'";

    //Execute the query
    $result = @$conn->query($query_stry);
    if($result -> num_rows){
        //It is a valid user. Need to store the user in Session Variables
        session_start();
        $_SESSION['login'] = $username;
        $result_row = $result->fetch_assoc();
        $_SESSION['role'] = $result_row['user_role'];
        $_SESSION['name'] = $result_row['user_full_name'];
        $_SESSION['id'] = $result_row['user_id'];

        //update the login status
        $login_status = 1;
    }
    else{
      $login_status = 2;
    }


}
header( "Location: loginform.php?ls=$login_status");
$conn->close();
?>



















<!-- <style>
    *{
        text-ou
    }
.welcome-welcome-slide {
  position: relative;
  z-index: 2;
  width: 100%;
  height: 500px; }

  .form-control{
    padding:20px;
    border-radius:6px;
  }
  .form-control:focus{
      border:1px solid #f55656;
  }
  </style>
<div class="welcome-slides owl-carousel" style="width:100"> -->

<!-- Single Welcome Slide -->
<!-- <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/1.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12"> -->
        <!-- Welcome Text -->
        <!-- <div class="welcome-text">
          <h2 data-animation="fadeInUp" data-delay="100ms">Log In!</h2>
          <h5 data-animation="fadeInUp" data-delay="300ms">Please schedule a podcast post, to make it visible here.</h5>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<br> 

<div class="container">
	<div class="col-xs-8 col-xs-offset-2">
    <h1 class="text-center">Login</h1>
    <p class="lead text-center">Please login to your account</p>
		<form class="form-horizontal" role="form" action="login.php" method="get" enctype="text/plain">
			<div class="form-group col-sm-6 mt-4" style="margin: 0 auto;">
				<div class="col-sm-10">
					<input type="text" class="form-control" id="newUserName" name="username" size="10" placeholder="Username" required >
				</div>
			</div>

            <div class="form-group col-sm-6 mt-4" style="margin: 0 auto;">
				<div class="col-sm-10">
					<input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
				</div>
			</div>

            <div class="form-group col-sm-6 mt-2" style="margin: 0 auto;">
				<div class="col-sm-10">
					<button type="submit" class="btn poca-btn mt-4">Login</button>
				</div>
			</div>
        </form>
        
	</div>
</div>
 -->

<?php
$page_title = "Login";
require_once('includes/header.php');
/**
 * Description:
 * check login status:
 * 1 -- last login attempt success
 * 2 -- last login attempt failed.
 * 3 -- user just registered. Logged in automatically.
 * other -- new login attempt
 *
 */
?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Login</h2>
        </div>
      </div>
    </div>
</div>
  
  
  <!-- ***** Breadcrumb Area End ***** -->

    <div class="container wrapper mt-5">
       
        <div class="col-xs-6 col-xs-offset-2">
            <?php
            if( isset( $_GET['ls'] ) ) {
                $login_status = $_GET['ls'];


                if ($login_status == 1) {

                    // header("Refresh:2; url=index.php", true, 303);
                    echo "<p class='lead'>You are logged in as <span class='text-success text-uppercase'>", $login, "</span></p>";
                    echo "<a class='btn poca-btn' href='logout.php'>LOG OUT</a><br>";
                   
                    
                } elseif ($login_status == 2) {
                    echo "<h1>Login</h1>";
                    echo "<p class='lead text-danger'>Incorrect user name/password combination.</p>";

                } elseif ($login_status == 3) {
                    echo "<h1>Login</h1>";
                    echo "<p class='lead text-success'>Thank you. Your account has been created.</p>";
                    echo "<a class='btn poca-btn' href='logout.php'>LOG OUT</a><br>";
                    header( "Refresh:3; url=useraccount.php", true, 303);
                }
            }else {
                echo "<p class='lead'>You are not logged in. Please login or <a href='signup.php'>create</a> a new account</p>";
            }

            if ( $login_status != 1 && $login_status != 3 ) { ?>
            <div class="breadcumb--con">
                <div class="container">
                <div class="row">
                    <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                    </div>
                </div>
                </div>
            </div>
                <form class="form-horizontal" role="form" action="login.php" method="post">
                    <div class="form-group">
                        <div class="col-md-6 logsign">
                            <input type="text" class="form-control" id="newUserName" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 logsign ">
                            <input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-md-6 logsign">
                            <button type="submit" class="btn poca-btn">SIGN IN</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
<?php
include ('includes/footer.php');
?>
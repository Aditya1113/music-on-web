<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Update user details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve all fields from the previous page
$user_id = $_GET['id'];
$user_name = $_GET['username'];
$full_name = $_GET['name'];
$user_email = $_GET['email'];
$password = $_GET['password'];

//update statement
$query_str = "UPDATE users SET
    user_name='$user_name',
    user_full_name='$full_name',
    user_email='$user_email',
    user_password='$password'
    WHERE user_id='$user_id'";

//execute the query
$result = @$conn->query($query_str);

//Handle selection errors
if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Connection Failed with: $errno, $errmsg<br/>\n";
  exit;
}else {
  ?>
  <?php ?>

  <!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Your Profile</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <div class="container wrapper mt-3">
    <h2 class="text-center text-success mt-5">Your account has been updated</h2>
  </div>
  


<?php

    //The SQL select statement
    $query = "SELECT * FROM users WHERE user_name='$user_name' AND user_password='$password'";

    //Execute the query
    $result = @$conn->query($query);
    if($result -> num_rows){
      session_destroy();
      //It is a valid user. Need to store the user in Session Variables
      session_start();
      $_SESSION['login'] = $user_name;
      $result_row = $result->fetch_assoc();
      $_SESSION['role'] = $result_row['user_role'];
      $_SESSION['name'] = $result_row['user_full_name'];
      $_SESSION['id'] = $result_row['user_id'];
      //update the login status
      $login_status = 1;
    }

  header( "Refresh:1; url=useraccount.php", true, 303);
}
// close the connection.
$conn->close();

include ('includes/footer.php');
?>

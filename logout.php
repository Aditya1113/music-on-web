<?php
session_start();

//destroy the session data on disk
session_destroy();

//delete the session cookie
setcookie(session_name(), '', time()-3600);

//destroy the $_SESSION array
$_SESSION = array();

$page_title = "Log Out";
header( "Refresh:3; url=index.php", true, 303);
require_once('includes/header.php');
?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">See You Soon!</h2>
        </div>
      </div>
    </div>
</div>  
  <!-- ***** Breadcrumb Area End ***** -->

<div class="container wrapper mt-3">
    <h1 class="text-center">Logged Out</h1>
    <p class="lead text-center text-danger"> Thank you for your visit. You are now logged out.</p>
</div>

<?php

include('includes/footer.php'); ?>
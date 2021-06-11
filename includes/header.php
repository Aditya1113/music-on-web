<?php
session_start();
//check to see if a user if logged in
$login = '';
$name = '';
$role = 0;

if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
}

if (isset($_SESSION['name'])) {
	$name = $_SESSION['name'];
}

if (isset($_SESSION['role'])){
	$role = $_SESSION['role'];
}

if (isset($_SESSION['id'])) {
	$session_id = $_SESSION['id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Poca - Podcast &amp; Audio Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title><?php echo $page_title;  ?></title>

  <!-- Favicon -->
  <link rel="icon" href="./img/core-img/favicon.ico">

  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="style.css">

</head>

<body>
  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader-thumbnail">
      <img src="./img/core-img/preloader.png" alt="">
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
      <div class="classy-nav-container  breakpoint-on">
        <!-- Classy Menu -->
        <nav class="classy-navbar justify-content-between" id="pocaNav">

          <!-- Logo -->
          <a class="nav-brand" href="index.php"><img src="" alt=""></a>

          <!-- Navbar Toggler -->
          <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
          </div>

          <!-- Menu -->
          <div class="classy-menu">

            <!-- Menu Close Button -->
            <div class="classycloseIcon">
              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>

            <!-- Nav Start -->
            <?php $page=basename($_SERVER['PHP_SELF']); ?>
            <div class="classynav">
              <ul id="nav">
                <li class="<?php if($page=='index.php'){echo'current-item';}?>"><a href="index.php">Home</a></li>
                <li class="<?php if($page=='about.php'){echo'current-item';}?>"><a href="about.php">About Us</a>
                <li class="<?php if($page=='signup.php'){echo'current-item';}?>"><a href="signup.php">Signup</a></li>
                <li class="<?php if($page=='contact.php'){echo'current-item';}?>"><a href="contact.php">Contact</a></li>
                <?php if (empty($login)) :?>
                  <li class="<?php if($page=='login.php'){echo'current-item';}?>"><a href='login.php'>Login</a></li>
                <?php
                endif;
                if ($role == 1) : ?>
                <li><a href="playlist.php">Playlist</a>
                <li><a href="#">Account</a>
                  <ul class="dropdown">
                    <li><a href="useraccount.php">Profile</a></li>
                    <li><a href="addsongs.php">Add Songs</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
               <?php
                endif;
                if ($role == 2) : ?>
                  <li><a href="playlist.php">Playlist</a>
                   <li><a href="#">Account</a>
                  <ul class="dropdown">
                    <li><a href="useraccount.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
               <?php
                endif;?>
              </ul>

              <!-- Top Search Area -->
              <div class="top-search-area">
                <form action="index.php" method="post">
                  <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                  <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
              </div>

            </div>
            <!-- Nav End -->
          </div>
        </nav>
      </div>
    </div>
  </header>

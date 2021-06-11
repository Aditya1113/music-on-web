<?php

$page_title = "Create new user";

include ('includes/header.php');
?>
<style>
.welcome-welcome-slide {
  position: relative;
  z-index: 2;
  width: 100%;
  height: 500px; }
 
  </style>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Signup</h2>
        </div>
      </div>
    </div>
  </div>
<!-- ***** Breadcrumb Area End ***** -->

<div class="container">
    
	<div class="col-xs-8 col-xs-offset-2 mt-5">
    <h1 class="text-center">REGISTER</h1>
    <p class="lead text-center">Please register your account</p>
	<div class="container">
		<form class="form-horizontal" role="form" action="register.php" method="get" enctype="text/plain">
			<div class="form-group">
				<div class="col-sm-10 logsign">
					<input type="text" class="form-control mt-2" id="newUserName" name="username" placeholder="Username" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 logsign">
					<input type="text" class="form-control" id="newName" name="name" placeholder="Name" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 logsign">
					<input type="email" class="form-control" id="newEmail" name="email" placeholder="Email" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 logsign">
					<input type="password" class="form-control" id="newPassword" name="password" placeholder="Password" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 logsign">
					<button type="submit" class="btn poca-btn mt-4">Register</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>


<?php
include('includes/footer.php');
?>
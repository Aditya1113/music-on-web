<?php
require_once ('includes/header.php');
?>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Add Songs!</h2>
        </div>
      </div>
    </div>
  </div> 
  <div class="breadcumb--con">
                <div class="container">
                  <div class="row">
                      <div class="col-12">
                      <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="#"><i class="fa fa-user"></i> Account</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Add Songs</li>
                          </ol>
                      </nav>
                      </div>
                  </div>
                </div>
  </div> 
  <!-- ***** Breadcrumb Area End ***** -->


<h1 class="text-center text-success mt-5">Please add your desired song!</h1>
<div class="container">
<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !='')
{
  echo'<h2 class="bg-success text-white"> '.$_SESSION['success'].' </h2>';
  unset($_SESSION['success']);
  header("Refresh:1; url=index.php");

}
if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
  echo'<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
  unset($_SESSION['status']);
}
?>
</div>
  <div class="container justify-content-center ">
    <form name ="addsong" class="form-horizontal" role="form" action="processsongs.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="newMovieName" class="col-sm-3 control-label">Title</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="newMovieName" name="song_name" placeholder="Song Title" required>
        </div>
      </div>
    
      <div class="form-group">
          <label for="newMovieName" class="col-sm-3 control-label">Singer</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="newMovieName" name="author" placeholder="Singer Name" required>
          </div>
      </div>

      <div class="form-group">
        <label for="songYear" class="col-sm-3 control-label">Year</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="songYear" name="song_year" placeholder="Year" required>
        </div>
      </div>
      
      <div class="form-group">
        <label for="newImage"class="col-sm-3 control-label">Song Cover URL</label>
        <div class="col-sm-9">
          <input type="file" style="padding:2px;" accept="image/png, image/jpeg" id="newImage" class="form-control" name="image" required>
        </div>
      </div>
    
      <div class="form-group">
        <label for="newAudio" class="col-sm-3 control-label">Audio track</label>
        <div class="col-sm-9">
          <input type="file" style="padding:2px;" accept="audio/mpeg3" id="newAudio" class="form-control" name="track" required>
        </div>
      </div>

      <div class="form-group">
        <label for="songGenre" class="col-sm-3 control-label">Genre</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="songGenre" name="genre" placeholder="Genre" required>
        </div>
      </div>

      
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" name="songadd" class="poca-btn">Add Song</button>
        </div>
      </div>
    </form>
  </div>
  
      
<?php
  include ('includes/footer.php');
?>
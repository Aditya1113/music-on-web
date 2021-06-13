<?php
$page_title='home';
require_once ('includes/header.php');
require_once ('includes/database.php');

//select statement
$query_str = "SELECT * FROM songs";
$query1_str = "SELECT * FROM songs";
//execute the query
$result1 = $conn->query($query1_str);

//execut the query
$result = $conn->query($query_str);
if (!$result) {
	$errno = $conn->errno;
	$errmsg = $conn->error;
	echo "Selection failed with: ($errno) $errmsg<br/>\n";
	$conn->close();
	exit;
}
//  <!-- ** Header Area End ***** -->

else{
?>
<style>
  .hide{
    display:none;
  }

.red-color {
color:red;
}
.pointer:hover{
  cursor: pointer;
  color:#f55656;

}
.remove , .add,.like,.unlike{
  cursor:pointer;
}
.remove:hover , .add:hover,.like:hover,.unlike:hover{
  color:#f55656;
}

</style>
  <!-- ***** Welcome Area Start ***** -->
  <section class="welcome-area">
    <!-- Welcome Slides -->
    <div class="welcome-slides owl-carousel">
    <?php
    $j=0;
    while ( $result4_row = $result1->fetch_assoc() and $j<3):
                $j++;?>
      <!-- Single Welcome Slide -->
      <div class="welcome-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/<?php echo $j?>.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <!-- Welcome Text -->
              <div class="welcome-text">
                <h2 data-animation="fadeInUp" data-delay="100ms"><?php
                if ($role == 1  or $role == 2) {   echo"Hello, ",($_SESSION['login']);
                }
                else {
                  echo"Subscribe";
                }?></h2>
                <h5 data-animation="fadeInUp" data-delay="300ms">“Music, once admitted to the soul, becomes a sort of spirit and never dies.”</h5>
              </div>
              <!-- Welcome Music Area -->
              
             
              <div class="poca-music-area mt-100 d-flex align-items-center flex-wrap" data-animation="fadeInUp" data-delay="900ms">
                <div class="poca-music-thumbnail">
                  <img src="img/bg-img/<?php echo $result4_row['image']?>" alt="">
                </div>
                <div class="poca-music-content">
                  <span class="music-published-date"><?php echo $result4_row['song_year'] ?></span>
                  <h2><?php echo $result4_row['song_name'] ?></h2>
                  <div class="music-meta-data">
                    <p>By <a href="#" class="music-author"><?php echo $result4_row['author'] ?></a><a href="#" class="music-catagory">Tutorials</a> | <a href="#" class="music-duration">00:02:56</a></p>
                  </div>
                  <!-- Music Player -->
                  <div class="poca-music-player">
                    <audio preload="auto" controls>
                      <source src="audio/<?php echo $result4_row['track']?>">
                    </audio>
                  </div>
                  <!-- Likes, Share & Download -->
                  <div class="likes-share-download d-flex align-items-center justify-content-between">
                    <div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile;?>
    </div>
  </section>
  <!-- ***** Welcome Area End ***** -->

  <!-- ***** Latest Episodes Area Start ***** -->
  <section class="poca-latest-epiosodes section-padding-80">
    <div class="container">
      <div class="row">
        <!-- Section Heading -->
        <div class="col-12">
          <div class="section-heading text-center">
            <h2>Latest Music</h2>
            <div class="line"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Projects Menu -->
    <div class="container">
      <div class="poca-projects-menu mb-30 wow fadeInUp" data-wow-delay="0.3s">
        <div class="text-center portfolio-menu">
          <button class="btn active" data-filter="*">All</button>
          <button class="btn" data-filter=".hindi">Hindi</button>
          <button class="btn" data-filter=".english">English</button>
          <button class="btn" data-filter=".punjabi">Punjabi</button>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row poca-portfolio">

        <!-- Single gallery Item -->
        <?php
              $i = 0;
              while ( $result_row = $result->fetch_assoc()) :
                $i++;
        ?>
      <div class="col-12 col-md-6 single_gallery_item <?php echo $result_row['genre'] ?> wow fadeInUp" data-wow-delay="0.2s">
          <!-- Welcome Music Area -->
          <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
            <div class="poca-music-thumbnail">
              <img src="img/bg-img/<?php echo $result_row['image'] ?>"alt="">
            </div>
            <div class="poca-music-content text-center">
              <span class="music-published-date mb-2"><?php echo $result_row['song_year'] ?></span>
              <h2><?php echo $result_row['song_name'] ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"><?php echo $result_row['author'] ?></a><a href="#" class="music-catagory"></a><a href="#" class="music-duration"></a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/<?php echo $result_row['track']?>">
                </audio>
              </div>
              <!-- Likes, Share & Download -->
              <div class="likes-share-download d-flex align-items-center justify-content-between">
              <div>
                <?php  if ($role == 1 or $role == 2){ 
                  $query4="SELECT * FROM likes where userid='".$_SESSION['id']."' and songid='".$result_row['song_id']."'";
                  $result4=$conn->query($query4);
                    if (($result4->num_rows) == 1 ){?>
                      <span class="unlike fa fa-heart red-color" data-id="<?php echo $result_row['song_id'];?>"></span>
                      <span class="like hide fa fa-heart" data-id="<?php echo $result_row['song_id']; ?>"></span>
                      <?php } else { ?>
                      <span class="like fa fa-heart" data-id="<?php echo $result_row['song_id'];?>"></span>
                      <span class="unlike hide fa fa-heart red-color" data-id="<?php echo $result_row['song_id'];?>"></span>
                    <?php } ?>
                    <span class="likes_count"><?php echo $result_row['likes'];?> <?php if($result_row['likes']==1){
                    echo "like";} else { echo "likes";}?></span>
                 <?php }
                    else {?>
                      <span onclick="user" class="pointer fa fa-heart">&nbsp;<?php echo $result_row['likes'];?> <?php if($result_row['likes']==1){
                    echo "like";} else { echo "likes";}?></span>
                    <span class="text text-danger hide" id="non-login"><strong>Please Login first!</strong></span>
                    <?php } ?>
                  </div>
                <div>
                <?php if ($role == 1 or $role == 2){ 
                  $query3="SELECT * FROM playlist where user_id='".$_SESSION['id']."' and song_id='".$result_row['song_id']."'";
                  $result3=$conn->query($query3);
                    if(($result3->num_rows)==1){?>
                      <span class="remove fa fa-trash" data-id="<?php echo $result_row['song_id'];?>">Remove</span>
                      <span class="add hide fa fa-user-plus" data-id="<?php echo $result_row['song_id'];?>">Add to Playlist</span>
                      <?php } else {?>
                        <span class="add fa fa-user-plus " data-id="<?php echo $result_row['song_id'];?>">Add to Playlist</span>
                      <span class="remove hide fa fa-trash" data-id="<?php echo $result_row['song_id'];?>">Remove</span>
                    <?php }} else {?>
                      <span class="pointer fa fa-user-plus" onclick="non-login()">Add to Playlist</span>
                      <?php }?>&nbsp;
                  <span href="download.php?id='<?php echo $result_row['song_id'];?>'" class="pointer fa fa-download">&nbsp;<span onclick="download_update('<?php echo $result_row['song_id'];?>')">Download&nbsp;(<span id="download_loop_<?php echo $result_row['song_id'];?>"><?php echo$result_row['downloads'];?></span>)</span>
                    </span>
                </div>
                <?php if ($role == 1){?>
                <div>
						      <a href="deletesong.php?id=<?php echo $result_row['song_id']; ?>"> <button class="poca-btn">delete song</button></a>
                </div>
                <?php }?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile;?>
      </div>
      <?php $result->close();
    }
            $conn->close();
      ?>


    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <a href="#" class="btn poca-btn mt-70">Load More</a>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Latest Episodes Area End *****


  <!- ***** Newsletter Area Start ***** -->
  <section class="poca-newsletter-area bg-img bg-overlay pt-50 jarallax" style="background-image: url(img/bg-img/15.jpg);">
    <div class="container">
      <div class="row align-items-center">
        <!-- Newsletter Content -->
        <div class="col-12 col-lg-6">
          <div class="newsletter-content mb-50">
            <h2>Sign Up To Newsletter</h2>
            <h6>Subscribe to receive info on our latest news and episodes</h6>
          </div>
        </div>
        <!-- Newsletter Form -->
        <div class="col-12 col-lg-6">
          <div class="newsletter-form mb-50">
            <form action="#" method="post">
              <input type="email" name="nl-email" class="form-control" placeholder="Your Email">
              <button type="submit" class="btn">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Newsletter Area End ***** -->
  <?php include ('includes/footer.php')?>
  
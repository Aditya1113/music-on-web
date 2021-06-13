<?php
$page_title='Your Playlist';
require_once ('includes/header.php');
require_once ('includes/database.php');
$query_str = "SELECT * FROM playlist inner join songs on playlist.song_id=songs.song_id";
//execute the query
$result = $conn->query($query_str);


?>
<style>
  .hide{
    display:none;
  }

.red-color {
color:red;
}
.remove , .add,.like,.unlike{
  cursor:pointer;
}
</style>
  <!-- ***** Breadcrumb Area Start ***** -->
  <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Your Playlist</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Breadcrumb Area End ***** -->

  <!-- ***** Featured Music Area Start ***** -->
  <?php
  
              $i = 0;
              while ( $row1 = $result->fetch_assoc() ) :
                $i++;
                if($row1['user_id']==$_SESSION['id']){
  ?>
  <div class="poca-featured-music-area mt-50" id="rem<?php echo $row1['song_id'];?>">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="poca-music-area box-shadow d-flex align-items-center flex-wrap border" data-animation="fadeInUp" data-delay="900ms">
            <div class="poca-music-thumbnail">
              <img src="img/bg-img/<?php echo $row1['image'] ?>" alt="">
            </div>
            <div class="poca-music-content">
              <span class="music-published-date"><?php echo $row1['song_year'] ?></span>
              <h2><?php echo $row1['song_name'] ?></h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author"><?php echo $row1['author'] ?></a><a href="#" class="music-catagory"></a><a href="#" class="music-duration"></a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/<?php echo $row1['track'] ?>">
                </audio>
              </div>
              <!-- Likes, Share & Download -->
              <div class="likes-share-download d-flex align-items-center justify-content-between">
                <div>
                <?php  if ($role == 1 or $role == 2){ 
                  $query4="SELECT * FROM likes where userid='".$_SESSION['id']."' and songid='".$row1['song_id']."'";
                  $result4=$conn->query($query4);
                    if (($result4->num_rows) == 1 ){?>
                      <span class="unlike fa fa-heart red-color" data-id="<?php echo $row1['song_id'];?>"></span>
                      <span class="like hide fa fa-heart" data-id="<?php echo $row1['song_id']; ?>"></span>
                      <?php } else { ?>
                      <span class="like fa fa-heart" data-id="<?php echo $row1['song_id'];?>"></span>
                      <span class="unlike hide fa fa-heart red-color" data-id="<?php echo $row1['song_id'];?>"></span>
                    <?php } ?>
                    <span class="likes_count"><?php echo $row1['likes'];?> <?php if($row1['likes']==1){
                    echo "like";} else { echo "likes";}?>
                  </span>
                  <?php  } ?>
                </div>
                <div>
                <?php if ($role == 1 or $role == 2){
                      ?>

                      <?php 
                        $query3="SELECT * FROM playlist where user_id='".$_SESSION['id']."' and song_id='".$row1['song_id']."'";
                        $result3=$conn->query($query3);
                        if($result3->num_rows==1){?>
                        <span><a href="javascript:void(0)" class="remove1" id="<?php echo $row1['song_id'];?>"><i class="fa fa-trash" aria-hidden="true">Remove</i></a></span>
                        <?php }
                         }                 
                      ?>
                      <a href="download.php?id='<?php echo $row1['song_id'];?>'"><span onclick="download_update('<?php echo $row1['song_id'];?>')"><i class="fa fa-download"></i> Download(<span id="download_loop_<?php echo $row1['song_id'];?>"><?php echo$row1['downloads'];?></span>)</span>
                      </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
 }
endwhile;
  ?>
  <!-- ***** Featured Music Area End ***** -->
<?php
  include ('includes/footer.php')
  ?>
<hr>
<footer class="footer-area section-padding-80-0">
    <div class="container">
      <div class="row">

        <!-- Single Footer Widget -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">
            <!-- Widget Title -->
            <h4 class="widget-title">About Us</h4>

            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
            <div class="copywrite-content">
              <p>© 

Copyright ©<script>document.write(new Date().getFullYear());</script>
            </div>
          </div>
        </div>

      

   <!-- Single Footer Widget -->
   <!-- Single Footer Widget -->
   <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">
            <!-- Widget Title -->
           
          </div>
        </div>

        <!-- Single Footer Widget -->
        <div class="col-12 col-sm-6 col-lg-3">
        <h4 class="widget-title">Categories</h4>

<!-- Catagories Nav -->
        <nav>
          <ul class="catagories-nav">
            <li><a href="#">Rock</a></li>
            <li><a href="#">Jazz</a></li>
            <li><a href="#">Classical</a></li>
            <li><a href="#">Folk</a></li>
          </ul>
        </nav>
          <div class="single-footer-widget mb-80">
            <!-- Widget Title -->
            <h4 class="widget-title">Latest Music</h4>

            <!-- Single Latest Episodes -->
            <div class="single-latest-episodes">
              <p class="episodes-date">December 9, 2018</p>
              <a href="#" class="episodes-title">Episode 205 - See Ya In Three!</a>
            </div>
            <!-- Single Latest Episodes -->
            <div class="single-latest-episodes">
              <p class="episodes-date">December 8, 2018</p>
              <a href="#" class="episodes-title">Episode 204 - See Ya In Two!</a>
            </div>
          </div>
        </div>
 <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-footer-widget mb-80">
            <!-- Widget Title -->
            <h4 class="widget-title">Follow Us</h4>
            <!-- Social Info -->
            <div class="footer-social-info">
              <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a>
              <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="" data-original-title="YouTube"><i class="fa fa-youtube-play"></i></a>
            </div>
            <!-- App Download Button -->
            <div class="app-download-button mt-30">
              <a href="#"><img src="./img/core-img/app-store.png" alt=""></a>
              <a href="#"><img src="./img/core-img/google-play.png" alt=""></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </footer>
  <!-- ***** Footer Area End ***** -->
<!-- ******* All JS ******* -->
  <!-- jQuery js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>        
  <script src="js/jquery.min.js"></script>
  <!-- Popper js -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- All js -->
  <script src="js/poca.bundle.js"></script>
  <!-- Active js -->
  <script src="js/default-assets/active.js"></script>
  <script>
    document.querySelector(".form-control").blur();
    var activeclass = document.querySelectorAll('#nav li');
   for (var i = 0; i < activeclass.length; i++) {
    activeclass[i].addEventListener('click', activateClass);
   }
function activateClass(e) {
  for (var i = 0; i < activeclass.length; i++) {
        activeclass[i].classList.remove('current-item');
    }
    e.target.classList.add('current-item');
}
      
$(document).ready(function(){
  $('.add').on('click',function(){
			var songid = $(this).attr('id');
      $(this).html('<i class="fa fa-trash" aria-hidden="true">Remove</i>');
     $.ajax({
        url:'playlistprocess.php',
        type:'get',
        data:{'added':1,'id':songid},
        success:function(){
        }
     });
  });
  $('.remove').on('click', function(){
			var songid = $(this).attr('id');

      $(this).html('<i class="fa fa-user-plus" aria-hidden="true">Add to Playlist</i>');

      
			$.ajax({
				url: 'playlistprocess.php',
				type: 'get',
				data: {
					'removed': 1,
					'id': songid
				},
				success: function(){
        }
      });
  });
  $('.remove1').on('click', function(){
			var songid = $(this).attr('id');
    $('#rem'+songid).hide();
			$.ajax({
				url: 'playlistprocess.php',
				type: 'get',
				data: {
					'removed': 1,
					'id': songid
				},
				success: function(){
        }
      });
  });
});


  function download_update(id){
  var cur_count=$('#download_loop_'+id).html();
  cur_count++;
  $('#download_loop_'+id).html(cur_count);
  $.ajax({
    url:'downloadcount.php',
    type:'get',
    data:'id='+id,
    success:function(){

    }
  })
}

function like_update(id){
  var like_count=$('#like_loop_'+id).html();
  like_count++;
  $('#like_loop_'+id).html(like_count);
  $.ajax({
    url:'likes.php',
    type:'get',
    data:'id='+id,
    success:function(){

    }
  })
}
const timeout = document.querySelector('.alertdiv');
  setTimeout( 
  function () {
    timeout.style.display = 'none';
  },5000);
</script>

</body>

</html>
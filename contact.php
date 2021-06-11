<?php 
$page_title='contact us';
$note=1;
include ('includes/header.php');
include ('includes/database.php');
if(isset($_REQUEST['note'])){
  $note=$_REQUEST['note'];
}
?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <h2 class="title mt-70">Contact Us</h2>
        </div>
      </div>
    </div>
  </div>
<!-- ***** Breadcrumb Area End ***** -->

<section class="poca-contact-area mt-50 mb-100">
    <div class="container">  
      <div class="row">
        <!-- Contact Information -->
        <div class="col-12 col-md-6">
          <div class="contact-information">
            <div class="contact-heading mb-50">
              <h2>Contact Info</h2>
              <h6>We will be happy to assist you with any question</h6>
              <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt ut labore et dolore magna. Integer vehicula mauris libero, at molestie eros imperdiet sit amet. Suspendisse mattis ante sit amet ante.</p>
            </div>


            <h5>Address:Lorem ipsum dolor sit amet consectetur adipisicing elit.</h5>
            <h5>Phone: +01-3-8888-6868</h5>
            <h5>Email: info@musicmania.com </h5>
            <h5>Open Hours: Mon - Fri: 8:00 AM to 6:00 PM</h5>
          </div>
        </div>
      

        <!-- Contact Form -->
        <div class="col-12 col-md-6">
          <div class="contact-form">
            <div class="contact-heading">
            <?php if($note =='success'){ ?>
              <div class="alert alert-success alertdiv" role="alert">
                <h4 class="text-center">Thank you For contacting us!</h4>
              </div>
            <?php } ?>
            
              <h2>Get In Touch</h2>
              <h5>Don't hesitate to contact us</h5>
            </div>
            <!-- Form -->
            <form action="contactform.php" method="post">
              <div class="row">
                <div class="col-12">
                  <input type="text" name="name" class="form-control mb-30" placeholder="Your Name">
                </div>
                <div class="col-12">
                  <input type="email" name="email" class="form-control mb-30" placeholder="Your Email">
                </div>
                <div class="col-12">
                  <textarea name="message" class="form-control mb-30" placeholder="Your Message"></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn poca-btn">Send Message</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Contact Area End ***** -->

  <!-- ***** Newsletter Area Start ***** -->
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

<?php include ("includes/footer.php") 
?>
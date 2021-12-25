

 <!-- subscription -->


<!-- footer -->

<footer id="aa-footer"><hr>
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="product.php">Our Products</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="wishlist.php">Wish List</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Coupon</a></li>
                      <li><a href="#">Special Offer</a></li>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">Review</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> Addis Ababa, Ethiopia</p>
                      <p><span class="fa fa-phone"></span>+251 928 59 83 85</p>
                      <p><span class="fa fa-envelope"></span>tshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="https://www.facebook.com/Temamhash/" target="_blank"><span class="fa fa-facebook"></span></a>
                      <a href="https://twitter.com/hashim_temam" target="_blank"><span class="fa fa-twitter"></span></a>
                      <a href="https://www.linkedin.com/in/temam-hashim-b4bb08190/" target="_blank"><span class="fa fa-google-plus"></span></a>
                      <a href="https://instagram.com/temamhashim" target="_blank"><span class="fa fa-instagram"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>


    <!-- footer-bottom -->
   <div class="aa-footer-bottom">
     <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">


                  <h3 style="color:white;">Subscribe our newsletter </h3>
                  <p style="color:white;">Get our newsLetter directly to your mailbox delivered.</p>
                  <form action="" class="form-inline">
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Enter your Email" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-md btn-danger" value="Subscribe">
                  </form>
            </div>

              <div class="aa-footer-bottom-area"  >
                <p class="hide">Designed by <a  href="http://www.markups.io/">MarkUps.io</a></p>
                <!-- <div class="aa-footer-payment">
                  <span class="fa fa-cc-mastercard"></span>
                  <span class="fa fa-cc-visa"></span>
                  <span class="fa fa-paypal"></span>
                  <span class="fa fa-cc-discover"></span>
                </div> -->

              </div>
          </div>
       </div>
      </div>
    </div>
  </footer>
  <hr>
  <!-- / footer -->

  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="handler/account.php" method="POST">
            <label for="">Enter Email address<span>*</span></label>
            <input type="text" placeholder="enter email" name="email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="password">
            <button class="aa-browse-btn" type="submit" name="login">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="forgot.php">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.php">Register now!</a>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>



    <!-- Message Modal -->
    <div class="modal fade" id="message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Message</h4>
          <?php
            if(isset($_GET['message'])){
              echo $message;
            }

          ?>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>


  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script>



  <script>

  // script for modal view

$(document).ready(function(){

$('.quick_view').click(function(){

  var quick_id = $(this).data('id');

  // AJAX request
  $.ajax({
   url: 'ajaxFile.php',
   type: 'post',
   data: {quick_id: quick_id},
   success: function(response){
     // Add response in Modal body
     $('.modal-row').html(response);

     // Display Modal
     $('#quick-view-modal').modal('show');
   }
 });
});
});

// dismisable alert message
$('.alert').alert()
$().alert('close')
$().alert()
$().alert('dispose')

Events

close.bs.alert
closed.bs.alert

</script>
  </body>
</html>
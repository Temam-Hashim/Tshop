<?php require_once "includes/header.php" ; ?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="images/1920X300/banner-4.jpg" alt="fashion img" style="width:1920px;height:200px;">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Contact</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Contact</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- start contact section -->
<?php
          if(isset($_GET['warning'])){
              $warning = $_GET['warning'];
              echo "$warning";

          }
 ?>
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>We are wating to assist you..</h2>
             <p>Don't histate to contact us at any time.</p>
           </div>

           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" action="handler/contact.php" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Your Name" class="form-control" name="name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="email" placeholder="Email" class="form-control" name="email">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Subject" class="form-control" name="subject">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" placeholder="Company" class="form-control" name="company">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <textarea class="form-control" rows="3" cols="30"  placeholder="Message" name="message"></textarea>
                          </div>
                       </div>
                    </div>
                    <div class="text-center">
                         <button class="btn btn-primary btn-lg btn-block" type="submit" name="send" style="border:2px;border-radius:10px;">Send</button>
                    </div>

                  </form>
                 </div>
               </div>

               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>TShop</h4>
                     <p>We are always inplace 24X7 to help our customer.</p>
                     <p><span class="fa fa-home"></span>Assosa, Addis Ababa, Ethiopia</p>
                     <p><span class="fa fa-phone"></span>+251 928 59 83 85</p>
                     <p><span class="fa fa-envelope"></span>Email: support@tshop.com</p>
                   </address>
                 </div>
                 <hr><hr>
               </div>

             </div>
           </div>
                             <!-- contact map -->
                  <div class="aa-contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
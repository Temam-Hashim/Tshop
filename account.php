<?php require_once "includes/header.php" ; ?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="images/1920X300/banner-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Account</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->


 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
<?php
    if(isset($_GET['message'])){
      echo $_GET['message'];
    }

  ?>
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="handler/account.php" class="aa-login-form" method="POST">
                  <label for="">Enter Email address<span>*</span></label>
                   <input type="text" class="stext-111 cl2 size-116 p-1-62 p-r-30" placeholder="Enter your email" name="email">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" class="aa-browse-btn" name="login">Login</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                    <p class="aa-lost-password"><a class="btn btn-sm" href="forgot.php">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <form action="handler/account.php" class="aa-login-form" method="post">
                    <label for="">Enter Email address<span>*</span></label>
                    <input type="text" placeholder="enter your email" name="email">
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" class="aa-browse-btn" name="register">Register</button>
                  </form>
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
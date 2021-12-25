<?php
 ob_start();
 session_start();
 require_once "db.php";
 require_once "handler/function.php";
 if(isset($_GET['pr_id'])){
   $pr_id = $_GET['pr_id'];
    UpdateView($pr_id);
    UpdateRating($pr_id);
 }

?>
<?php require_once "head.php"; ?>

  <body>

   <!-- wpf loader Two -->
    <!-- <div id="wpf-loader-two">
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> -->
    <!-- / wpf loader Two -->
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
<style>
  .aa-header-top a{
    color:skyblue !important;
  }
  .aa-header-top {
    background:black;
  }
  /* .aa-cartbox .aa-cart-link{
    float:left;
    padding:0 !important;
    margin-right:0% !important;
    position:relative;
    margin-left:46% !important;
  } */


</style>

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown" >
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="images/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" >
                      <li ><a href="#"><img src="images/flag/english.jpg" alt="">AMHARIC</a></li>
                      <li><a href="#"><img src="images/flag/english.jpg" alt="">OROMIGNA</a></li>
                      <li><a href="#"><img src="images/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-etb"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-usd"></i>ETB</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span><a href="tell://+251 928 59 83 85">+251 928 59 83 85</a></p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.php">My Account</a></li>
                  <li class="hidden-xs"><a href="wishlist.php">Wishlist</a></li>
                  <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.php">Checkout</a></li>
                  <?php if(isset($_SESSION['customer_username'])){?>
                    <li><a href="handler/logout.php">Logout</a></li>
                  <?php }else{ ?>

                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>T<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->

              <!-- wish box -->

              <div class="hidden-xs aa-cartbox">
                <a class="aa-cart-link" href="wishlist.php">
                  <span class="fa fa-heart"></span>
                  <span class="aa-cart-title">Wish List</span>
                  <span class="aa-cart-notify"><?php echo isset($_SESSION['wish'])?count($_SESSION['wish']):0; ?></span>
                </a>
              </div>

              <!-- / wish box -->
               <!-- cart box -->
              <div class="aa-cartbox" style="float:right;margin-right:0;padding:0;">
                <a class="aa-cart-link" href="cart.php">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <span class="aa-cart-notify"><?php echo isset($_SESSION['cart'])?count($_SESSION['cart']):0; ?></span>
                </a>

                <div class="aa-cartbox-summary">
                  <ul>
                  <?php
                     $sum = 0;
                     $total = 0;
                    if(isset($_SESSION['cart'])){
                      foreach($_SESSION['cart'] as $key=>$value){
                        $sum = $sum+$value['item_price'];
                        $total = $total + $value['item_price']*$value['quantity'];
                    ?>

                    <li>
                      <a class="aa-cartbox-img" href="product-detail.php?pr_id=<?php echo $value['item_id'];?>"><img src="<?php echo $value['item_image'] ?>" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="product-detail.php?pr_id=<?php echo $value['item_id'];?>"><?php echo $value['item_name'] ?></a></h4>
                        <p><?php echo $value['quantity']."X$".$value['item_price'] ?></p>
                      </div>
                      <form method="POST" action="handler/cartHandler.php">
                         <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
                        <button type="submit" class="aa-remove-product " name="remove" style="color:red;!important"><span class="fa fa-times"></span></button>
                      </form>
                    </li>

                    <?php }} ?>

                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        <?php echo $total; ?>
                      </span>
                    </li>
                  </ul>
                  <div class="row">
                        <div class="col-md-6">
                          <a class="aa-cartbox-checkout aa-primary-btn btn btn-sm" href="cart.php">view Cart</a>

                        </div>
                        <div class="col-md-6">
                          <a class="aa-cartbox-checkout aa-primary-btn btn btn-sm" href="checkout.php">Checkout</a>
                        </div>

                  </div>

                </div>


              </div>
              <!-- / cart box -->'

              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->

  <?php
    //include navigation menu below header
    require_once "nav_menu.php";
  ?>
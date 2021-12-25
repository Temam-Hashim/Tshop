<?php
  require_once "includes/header.php" ;
  require_once "includes/slider.php";
  require_once "includes/banner.php";
?>

<style>
 .product-img{
  min-height:300px;
  max-height:300px;
  min-width:250px;
  max-width:250px;
 }


</style>

  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#men" data-toggle="tab">Men</a></li>
                    <li><a href="#women" data-toggle="tab">Women</a></li>
                    <li><a href="#sports" data-toggle="tab">Sports</a></li>
                    <li><a href="#electronics" data-toggle="tab">Electronics</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="men">
                      <ul class="aa-product-catg">

<?php
$sql = "SELECT * FROM `products` WHERE `type`='men' ORDER BY pr_id DESC  limit 20";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture']);


?>

                        <li>
                          <figure>
                            <a class="aa-product-img" href="product-detail.php?pr_id=<?php echo $pr_id;?>"><img class="product-img" src="uploads/<?php echo $pr_picture[0];?>" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture[0];?>"><span class="fa fa-shopping-cart">
                            </span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="product_detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name']; ?></a></h4>
                              <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5; ?></del></span>
                            </figcaption>
                          </figure>
                          <div class="aa-product-hvr-content">
                          <?php //if(isset($_SESSION['wish'])){
                                // $checker = array_column($_SESSION['wish'],'item_id');
                                 //if(!in_array($pr_id,$checker)){
                            ?>
                              <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture[0];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                            <span class="fa fa-search"></span></a>
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>
<?php } ?>
                      </ul>
                      <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / men product category -->

                    <!-- start women product category -->
                    <div class="tab-pane fade" id="women">
                      <ul class="aa-product-catg">
<?php
$sql = "SELECT * FROM `products`  WHERE `type`='women' ORDER BY pr_id DESC limit 20 ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture'])

?>

                        <li>
                          <figure>
                            <a class="aa-product-img" href="product-detail.php?pr_id=<?php echo $pr_id;?>"><img class="product-img"  src="uploads/<?php echo $pr_picture[0];?>" alt="<?php echo $row['pr_name']; ?>"></a>
                            <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture[0];?>"><span class="fa fa-shopping-cart">
                            </span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="product_detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name']; ?></a></h4>
                              <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5; ?></del></span>
                            </figcaption>
                          </figure>
                          <div class="aa-product-hvr-content">
                          <?php if(isset($_SESSION['wish'])){
                                 $checker = array_column($_SESSION['wish'],'item_id');
                                 if(!in_array($pr_id,$checker)){
                            ?>
                            <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture[0];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <?php } else { ?>
                              <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a>
                            <?php } } ?>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                             <span class="fa fa-search"></span></a>
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>
<?php  } ?>
                      </ul>
                      <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / women product category -->


                    <!-- start sports product category -->

                    <div class="tab-pane fade" id="sports">
                      <ul class="aa-product-catg">
<?php

$sql = "SELECT * FROM `products` WHERE `tags` LIKE '%sport%'  OR `description` LIKE '%sport%' ORDER BY pr_id DESC LIMIT 20";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture'])

?>

                        <!-- start single product item -->
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product-detail.php?pr_id=<?php echo $pr_id;?>"><img class="product-img" src="uploads/<?php echo $pr_picture[0];?>" alt="<?php echo $row['pr_name']; ?>"></a>
                            <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture[0];?>">
                            <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="product_detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name']; ?></a></h4>
                              <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5; ?></del></span>
                            </figcaption>
                          </figure>
                          <div class="aa-product-hvr-content">
                          <?php if(isset($_SESSION['wish'])){
                                 $checker = array_column($_SESSION['wish'],'item_id');
                                 if(!in_array($pr_id,$checker)){
                            ?>
                            <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture[0];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <?php
                           }
                            else {
                           ?>
                              <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a>
                            <?php
                              }
                            }
                            ?>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                            <span class="fa fa-search"></span></a>
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>
<?php } ?>
                      </ul>
                      <!-- <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a> -->
                    </div>

                    <!-- / sports product category -->

                    <!-- start electronic product category -->
                    <div class="tab-pane fade" id="electronics">
                       <ul class="aa-product-catg">
<?php

$sql = "SELECT * FROM `products` WHERE `tags` LIKE '%electronics%'  OR `description` LIKE '%electronics%' ORDER BY pr_id DESC LIMIT 20 ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture'])

?>
                        <li>
                          <figure>
                            <a class="aa-product-img" href="product-detail.php?pr_id=<?php echo $pr_id;?>"><img class="product-img" src="uploads/<?php echo $pr_picture[0];?>" alt="<?php echo $row['pr_name']; ?>"></a>
                            <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture;?>">
                            <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="product_detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name']; ?></a></h4>
                              <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5; ?></del></span>
                            </figcaption>
                          </figure>
                          <div class="aa-product-hvr-content">
                          <?php if(isset($_SESSION['wish'])){
                                 $checker = array_column($_SESSION['wish'],'item_id');
                                 if(!in_array($pr_id,$checker)){
                            ?>
                            <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture;?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <?php } else { ?>
                              <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a>
                            <?php } } ?>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                            <span class="fa fa-search"></span></a>
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>
<?php } ?>


                      </ul>
                      <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                    </div>
                    <!-- / electronic product category -->
                  </div>
         <!-- quick view modal -->

                 <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row modal-row">

                      <!-- modal display here -->

                      </div>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
      <!--/ quick view modal -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="images/1170X170/im7.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">

<?php

$sql = "SELECT * FROM `products` WHERE `tags` LIKE '%popular%' OR `description` LIKE '%popular%' ORDER BY pr_id DESC LIMIT 20 ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture'])
?>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img class="product-img"  src="uploads/<?php echo $pr_picture[0];?>" alt="<?php echo $row['pr_name'];?>"></a>
                        <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture;?>">
                        <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name'];?></a></h4>
                          <span class="aa-product-price">$<?php echo $row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5;?></del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">
                      <?php if(isset($_SESSION['wish'])){
                                 $checker = array_column($_SESSION['wish'],'item_id');
                                 if(!in_array($pr_id,$checker)){
                          ?>
                          <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture;?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                          <?php } else { ?>
                            <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a>
                          <?php } } ?>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                        <span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>

<?php  } ?>





                  </ul>
                  <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->

                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
<?php

$sql = "SELECT * FROM `products` WHERE `tags` LIKE '%featured%' OR `description` LIKE '%featured%' ORDER BY pr_id DESC LIMIT 20";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture'])
?>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img class="product-img"   src="uploads/<?php echo $pr_picture[0];?>" alt="<?php echo $row['pr_name'];?>"></a>
                        <a class="aa-add-card-btn"
                        href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture;?>">
                        <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name'];?></a></h4>
                          <span class="aa-product-price">$<?php echo $row['price'];?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5;?></del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">
                      <?php if(isset($_SESSION['wish'])){
                                 $checker = array_column($_SESSION['wish'],'item_id');
                                 if(!in_array($pr_id,$checker)){
                        ?>
                        <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture;?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <?php } else { ?>
                          <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a>
                        <?php } } ?>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                        <span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>

<?php  } ?>

                  </ul>
                  <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
<?php

$sql = "SELECT * FROM `products`  WHERE `tags` LIKE '%latest%' OR `description` LIKE '%latest%' ORDER BY pr_id DESC LIMIT 20 ";
$result = $connect->query($sql);
while($row = $result->fetch_assoc()){
  $pr_id = $row['pr_id'];
  $pr_name = $row['pr_name'];
  $pr_price = $row['price'];
  $pr_picture = explode(",",$row['picture']);
?>
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img class="product-img"  src="uploads/<?php echo $pr_picture[0];?>" alt="<?php echo $row['pr_name'];?>"></a>
                        <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture;?>"><span class="fa fa-shopping-cart">
                        </span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product-detail.php?pr_id=<?php echo $pr_id;?>"><?php echo $row['pr_name'];?></a></h4>
                          <span class="aa-product-price">$<?php echo $row['price'];?></span><span class="aa-product-price"><del>$<?php echo $row['price']*1.5;?></del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">

                      <?php if(isset($_SESSION['wish'])){
                                 $checker = array_column($_SESSION['wish'],'item_id');
                                 if(!in_array($pr_id,$checker)){
                          ?>
                          <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture;?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                          <?php } else { ?>
                            <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a>
                          <?php } } ?>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                        <span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>

<?php  } ?>

                  </ul>
                   <a class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->

<?php
$i = 1;
while($i<5){

?>
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="images/150X150/<?php echo "product-".$i.".png";?>" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->

<?php $i++; } ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <!-- single latest blog -->

<?php
$i = 1;
while($i<4){

?>
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">
                    <a href="#">
                      <img src="images/450X450/<?php echo "product-".$i.".png";?>" alt="img"></a>
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p>
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
<?php $i++; } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">

<?php
$i = 1;
while($i<9){

?>
              <li><a href="#"><img src="images/135X35/<?php echo 'brand-'.$i.'.jpg'; ?>" alt="Tshop brand"></a></li>

<?php
$i++;
}
?>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->


  <?php
    if(isset($_GET['message'])){
      $message = $_GET['message'];
      echo "<script>alert('$message')</script>";
    }

  ?>



  <?php require_once "includes/footer.php" ; ?>
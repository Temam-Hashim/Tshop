


<?php require_once "includes/header.php" ; ?>

<?php
  if(isset($_GET['pr_id'])){
    $pr_id = $_GET['pr_id'];
    $sql = "SELECT * FROM `products`  WHERE pr_id='$pr_id'";
    $result = $connect->query($sql);
    $row = $result->fetch_array();

    $pr_id = $row['pr_id'];

    $pr_name = $row['pr_name'];
    $pr_price = $row['price'];
    $pr_picture = explode(',',$row['picture']);


    $pr_desc = $row['description'];
    $pr_size = $row['size'];
    $pr_avail = $row['availability'];
    $pr_cat_id = $row['category_id'];

    $pr_tag  = $row['tags'];


    // get category
    $cat_sql = "SELECT * FROM `categories` WHERE `cat_id`='$pr_cat_id'";
    $cat_result = $connect->query($cat_sql);
    $cat_row = $cat_result->fetch_array();
    $pr_category = $cat_row['cat_name'];
  }else{
    header("location:product.php");
  }

?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="images/1920X300/banner-5.webp" alt="fashion img" class="img-responsive">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2><?php echo $pr_name; ?></h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Product</a></li>
          <li class="active"><?php echo $pr_name; ?></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="uploads/<?php echo $pr_picture[0]; ?>" class="simpleLens-lens-image"><img src="uploads/<?php echo $pr_picture[0]; ?>" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <?php foreach($pr_picture as $pr_picture){ ?>
                          <a data-big-image="uploads/<?php echo $pr_picture; ?>" data-lens-image="uploads/<?php echo $pr_picture; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="uploads/<?php echo $pr_picture; ?>" style="width:45px;height:55px">
                          </a>
                          <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3 class="text-info"><?php echo $pr_name; ?></h3>
                    <div class="aa-price-block">
                      <p class="aa-product-view-price">Price: <span color="darkred">$<?php echo $pr_price; ?></span>
                      <p class="aa-product-avilability">Avilability: <span color="blue"><?php echo $pr_avail; ?></span></p>
                    </div>
                    <p><?php echo $pr_desc; ?></p>
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      <a href="#" class="aa-color-green"></a>
                      <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#"><?php echo $pr_category; ?></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture;?>">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture;?>">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p><?php echo $pr_desc ?></p>
                  <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                  </ul>
                  <p><?php echo $pr_desc; ?></p>

                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4>
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>
              </div>
            </div>
            <!-- Related product -->


            <div class="aa-product-related-item">
              <h3 class="text-info">Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                <?php
                    $rel_sql = "SELECT * FROM `products` WHERE `tags` LIKE '%$pr_tag%' OR `type` LIKE '%$pr_tag%' OR `description` LIKE '%$pr_tag%'
                      OR `pr_name` LIKE '%$pr_tag%' OR `pr_name` LIKE '%$pr_name%' OR `category_id`='$pr_cat_id'";
                    $rel_res = $connect->query($rel_sql);
                    while($rel_row = $rel_res->fetch_assoc()){
                      //$quick_id = $rel_row['id'];
                      $pr_picture = explode(",",$rel_row['picture']);
                  ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="product-detail.php?pr_id=<?php echo $rel_row['pr_id'];?>"><img style="width:250px;height:300px;" src="uploads/<?php echo $pr_picture[0]; ?>" alt="<?php echo $rel_row['pr_name']; ?>"></a>
                    <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture;?>">
                    <span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="product-detail.php?pr_id=<?php echo $rel_row['id'];?>"><?php echo $rel_row['pr_name']; ?></a></h4>
                      <span class="aa-product-price">$<?php echo $rel_row['price']; ?></span><span class="aa-product-price"><del>$<?php echo $rel_row['price']*1.5; ?></del></span>
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
                    <a href="#quick-view-modal" data-id="<?php echo $rel_row['pr_id']; ?>" data-toggle2="tooltip" class="quick_view"
                    data-placement="top" title="Quick View"  data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                <?php } ?>
              </ul>
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
              <!-- / quick view modal -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->






  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
<?php require_once "includes/header.php" ; ?>

<?php

if(isset($_GET['sortby'])){
  $sorter = $_GET['sortby'];
  $product_query = "SELECT * FROM `products` ORDER BY `{$sorter}` desc";
}
else if(isset($_GET['sortby']) && isset($_GET['show'])){
  $sorter = $_GET['sortby'];
  $show = $_GET['show'];
  $product_query = "SELECT * FROM `products` ORDER BY `{$sorter}` desc LIMIT $show";
}
else if(isset($_GET['show'])){
    $show = $_GET['show'];
    $product_query = "SELECT * FROM `products`  LIMIT $show";

}
else if(isset($_GET['lower']) && isset($_GET['upper'])){
  $p1 = $_GET['lower'];
  $p2 = $_GET['upper'];
  $product_query = "SELECT * FROM `products` where `price`>=$p1 AND `price`<=$p2 ORDER BY `price`";

}
else if(isset($_POST['cat_name'])){
  $cat_name = $connect->real_escape_string($_POST['cat_name']);
  $product_query = "SELECT * FROM  `categories` ct  inner join `products` pt  on pt.category_id=ct.cat_id where ct.cat_name='$cat_name'";
}
else if(isset($_POST['tags'])){
  $tags = $connect->real_escape_string($_POST['tags']);
  $product_query = "SELECT * FROM `products` WHERE `tags` LIKE '%$tags%'";
}
else{
  $product_query = "SELECT * FROM `products` ORDER BY pr_id desc ";
}





?>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img class="img-responsive" src="images/1920X300/banner-8.jpg" alt="fashion img" >
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Product</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="sortby" id="sortby" onchange="this.form.submit();">
                     <option value="id" selected></option>
                    <option value="pr_id">Default</option>
                    <option value="pr_name">Name</option>
                    <option value="price">Price</option>
                    <option value="created_at">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="show" onchange="this.form.submit();">
                    <option value="15"></option>
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="36">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->

                    <?php
                      $product_result = $connect->query($product_query);
                        while($row = $product_result->fetch_assoc()){
                          $pr_id = $row['pr_id'];
                          $pr_name = $row['pr_name'];
                          $pr_price = $row['price'];

                          $pr_picture = explode(",",$row['picture']);
                    ?>
                          <li>
                            <figure>
                              <a class="aa-product-img" href="product-detail.php?pr_id=<?php echo $pr_id; ?>">
                                <img  class="img-responsive" style="width:250px;height:300px;" src="uploads/<?php echo $pr_picture[0]; ?>" alt="<?php echo $row['pr_name']; ?>">
                            </a>
                              <a class="aa-add-card-btn" href="handler/addToCart.php?cart_id=<?php echo $pr_id;?>&cart_name=<?php echo $pr_name;?>&cart_price=<?php echo $pr_price;?>&cart_image=<?php echo $pr_picture[0];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                                <h4 class="aa-product-title"><a href="product-detail.php?pr_id=<?php echo $pr_id; ?>"><?php echo $row['pr_name']; ?></a></h4>
                                <span class="aa-product-price">$<?php echo $pr_price; ?></span><span class="aa-product-price"><del>$<?php echo $pr_price*1.5; ?></del></span>
                                <p><?php echo substr($row['description'],0,200); ?> </p>
                              </figcaption>
                            </figure>

                            <div class="aa-product-hvr-content">
                            <?php
                                // if(isset($_SESSION['wish'])){
                                //  $checker = array_column($_SESSION['wish'],'item_id');
                                //  if(!in_array($pr_id,$checker)){
                            ?>
                              <a href="handler/addToWishList.php?wish_id=<?php echo $pr_id;?>&wish_name=<?php echo $pr_name;?>&wish_price=<?php echo $pr_price;?>&wish_image=<?php echo $pr_picture[0];?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>

                                <!-- <a href="handler/wishHandler.php?wish_id=<?php echo $pr_id;?>" data-toggle="tooltip" data-placement="top" title="In your Wishlist"><span class="fa fa-heart"></span></a> -->


                              <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                              <a href="#quick-view-modal" data-id="<?php echo $pr_id;?>" data-toggle2="tooltip" class="quick_view" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal">
                              <span class="fa fa-search"></span></a>
                            </div>

                            <!-- product badge -->
                            <span class="aa-badge aa-hot" href="#">HOT!</span>
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
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>

              <ul class="aa-catg-nav">
              <?php
                $category = getAllCategory();
                while($cat_row = $category->fetch_assoc()){
                  $cat_id = $cat_row['cat_id'];
                  $cat_name = $cat_row['cat_name'];
                  ?>
                  <form action="" method="post">
                  <span><input type="submit" class="btn btn-sm" name="cat_name" value="<?php echo $cat_name;?>"></span>
               <?php }?>
               <!-- <button class="aa-filter-btn" type="submit" name="filterCat">Filter</button> -->
                </form>
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <form action="" method="post">
                <?php
                $sql = "SELECT * FROM `tags`";
                $result=$connect->query($sql);
                while($tag_row = $result->fetch_assoc()){
                  $tag_name = $tag_row['name'];
                  ?>
                   <input type="submit" class="btn btn-sm" name="tags" value="<?php echo $tag_name; ?>">
                  <?php } ?>
                </form>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>

              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="" >
                  <div class="form-group">
                    <input id="skip-value-lower" class="form-control"   type="number" name="lower" value="100">
                  </div>
                  <div class="form-group">
                    <input  id="skip-value-upper"  class="form-control"  type="number" name="upper" value="1000">
                 </div>

                 <button class="aa-filter-btn btn-md" type="submit">Filter</button>
               </form>
              </div>

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="#"></a>
                <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-cyan" href="#"></a>
                <a class="aa-color-olive" href="#"></a>
                <a class="aa-color-orchid" href="#"></a>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>

                  <?php
                  $i = 1;
                  $view_sql = "SELECT * FROM `products` ORDER BY `views_counter` desc limit 3";
                  $view_result = $connect->query($view_sql);
                  while($view_row = $view_result->fetch_assoc()){
                    $pr_id = $view_row['pr_id'];
                  ?>

                  <li>
                    <a href="product-detail.php?pr_id=<?php echo $pr_id; ?>" class="aa-cartbox-img"><img alt="img" src="<?php echo $view_row['pr_img'];?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="product-detail.php?pr_id=<?php echo $pr_id; ?>"><?php echo $view_row['pr_name'] ;?></a></h4>
                      <p><?php echo $i ?> x $<?php echo $view_row['price']; ?></p>
                    </div>
                  </li>
                  <?php $i++;}?>

                </ul>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>

                <?php
                  $i = 1;
                  $rate_sql = "SELECT * FROM `products` ORDER BY `rating` desc limit 5";
                  $rate_result = $connect->query($rate_sql);
                  while($rate_row = $rate_result->fetch_assoc()){
                    $pr_id = $rate_row['pr_id'];
                  ?>

                  <li>
                    <a href="product-detail.php?pr_id=<?php echo $pr_id; ?>" class="aa-cartbox-img"><img alt="img" src="<?php echo $rate_row['pr_img'];?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="product-detail.php?pr_id=<?php echo $pr_id; ?>"><?php echo $rate_row['pr_name'] ;?></a></h4>
                      <p><?php echo $i ?> x $<?php echo $rate_row['price']; ?></p>
                      <p> <span style="color:#FF0000"><?php //echo $rate_row['rating']; ?></span></p>
                    </div>
                  </li>
                  <?php $i++;}?>

                </ul>
              </div>
            </div>
          </aside>
        </div>

      </div>
    </div>
  </section>
  <!-- / product category -->



  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
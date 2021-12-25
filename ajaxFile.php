
  <?php

  require_once("includes/db.php");
  require_once "handler/function.php";

$quick_id=0;
$response="";
if(isset($_POST['quick_id'])){
  $quick_id = $_POST['quick_id'];

  $quick_sql = "SELECT * FROM `products` WHERE `pr_id`='$quick_id'";
  $quick_result = $connect->query($quick_sql);
  $quick_row = $quick_result->fetch_array();
  $quick_id = $quick_row['pr_id'];
  $quick_name = $quick_row['pr_name'];
  $quick_type = $quick_row['type'];
  $quick_picture = explode(",",$quick_row['picture']);
  $quick_price = $quick_row['price'];
  $quick_avail = $quick_row['availability'];
  $quick_desc = $quick_row['description'];

  $cat_id = $quick_row['category_id'];
//   get catgory of each product
$category = getSingleCategory($cat_id);
$cat_row = $category->fetch_array();
$cat_name = $cat_row['cat_name'];



  //$quick_picture = $quick_row['picture'];
$response = '
                    <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lens-image="uploads/'.$quick_picture[0].'">
                                        <img style="width:250px;height:300px;"src="uploads/'.$quick_picture[0].'" class="simpleLens-big-image">
                                    </a>
                                </div>
                               <div class="simpleLens-thumbnails-container text-center">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="uploads/'.$quick_picture[0].'"
                                    data-big-image="uploads/'.$quick_picture[0].'">
                                      <img style="width:45px;height:55px;" src="uploads/'.$quick_picture[0].'">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                    data-lens-image="uploads/'.$quick_picture[0].'"
                                    data-big-image="uploads/'.$quick_picture[0].'">
                                   <img style="width:45px;height:55px;" src="uploads/'.$quick_picture[0].'">
                                 </a>

                               </div>
                      </div>

                      <!-- Modal view content -->
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="aa-product-view-content">
                          <h3 class="text-center"> '.$quick_name.' </h3><hr>
                          <div class="aa-price-block">
                            <span class="aa-product-view-price">Price:<span color="darkred">$' .$quick_price.'</span></span>
                            <p class="aa-product-avilability">Avilability: <span>'.$quick_avail.'</span></p>
                          </div>
                          <p>'.substr($quick_desc,0,100).' <a class="btn btn-info" href="product-detail.php?pr_id='.$quick_id.'">read more</a></p>
                          <h4>Size</h4>
                          <div class="aa-prod-view-size">
                            <a href="#">S</a>
                            <a href="#">M</a>
                            <a href="#">L</a>
                            <a href="#">XL</a>
                          </div>
                          <div class="aa-prod-quantity">
                            <form action="">
                              <select name="" id="">
                                <option value="0" selected="1">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                              </select>
                            </form>
                            <p class="aa-prod-category">
                              Category: <a href="#">'.$cat_name.'</a>
                            </p>
                          </div>
                          <div class="aa-prod-view-bottom">
                            <a href="handler/addToCart.php?cart_id='.$quick_id.'&cart_name='.$quick_name.'&cart_price='.$quick_price.'&cart_image='.'uploads/'.$quick_picture[0].'" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <a href="product-detail.php?pr_id='.$quick_id.'" class="aa-add-to-cart-btn">View Details</a>
                          </div>
                        </div>
                      </div>';

}

echo $response;
exit();

?>
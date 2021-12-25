<?php require_once "includes/header.php" ; ?>

<style>


</style>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img class="img-responsive" src="images/1920X300/banner-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>


                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     $sum = 0;
                     $total = 0;
                    if(isset($_SESSION['cart'])){
                      foreach($_SESSION['cart'] as $key=>$value){
                        $sum = $sum+$value['item_price'];
                        $total = $total + $value['item_price']*$value['quantity'];

                    ?>
                      <tr>
                        <td>
                          <form action="handler/cartHandler.php" method="POST">
                            <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
                            <button type="submit" class="btn btn-sm btn-danger" title="remove" name="remove"><fa class="fa fa-close"></fa></button>
                          </form>
                        </td>
                        <form action="handler/cartHandler.php" method="POST">
                            <td>
                                  <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
                                  <button  type="submit" class="btn btn-sm btn-primary" title="update" name="update_cart"><fa class="fa fa-edit"></fa></button>
                            </td>
                            <td><a href="product-detail.php?pr_id=<?php echo $value['item_id'];?>"><img src="<?php echo $value['item_image'];?>" alt="img"></a></td>
                            <td><a class="aa-cart-title" href="product-detail.php?pr_id=<?php echo $value['item_id'];?>"><?php echo $value['item_name'] ?></a></td>
                            <td>$<?php echo $value['item_price']*1; ?></td>
                            <td><input class="aa-cart-quantity" min="1" type="number" name="quantity" value="<?php echo $value['quantity'] ?>"></td>
                            <td>$<?php echo $value['item_price']*$value['quantity']; ?></td>



                          </form>
                      </tr>


                      <?php }} ?>
                      <!-- <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                        </td>
                      </tr> -->

                      </tbody>
                  </table>
             <!-- Cart Total view -->
             <div class="table-responsive">
                  <table class="table table-borderless">
                  <caption>Cart Total</caption>
                    <thead>
                      <tr>
                        <th>SubTotal</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>


                      <tr>
                        <td>$<?php echo $total; ?></td>
                        <td>$<?php echo $total; ?></td>

                      </tr>
                      </tbody>
                  </table>
                </div>

               <a href="checkout.php" class="aa-cart-view-btn">Proced to Checkout</a>


               <!-- </form> -->
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

<!-- remove cart element -->




  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
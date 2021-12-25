<?php require_once "includes/header.php" ; ?>
<style>
  .text{
      width:70px;
      background:#FFF;
      opacity:0;
    }
  .add_to_cart:hover .text{
      -moz-box-shadow: 0 0 10px #ccc;
      -webkit-box-shadow: 0 0 10px #ccc;
      box-shadow: 0 0 10px #ccc;
      opacity:0.6;
      color:blue;
      width: 80px;
      position:relative;

  }
</style>

  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="images/1920X300/banner-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Wishlist Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Wishlist</li>
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
           <div class="cart-view-table aa-wishlist-table">
             <form action="handler/wishHandler.php" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <!-- <th>Stock Status</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_SESSION['wish'])){
                      foreach($_SESSION['wish'] as $key=>$value){
                    ?>
                      <tr>

                        <td>
                          <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                          <button type="submit" class="remove"  name="remove"><fa class="fa fa-close"></fa></button>
                        </td>
                        <td><a href="product-detail.php?pr_id=<?php echo $value['item_id'];?>"><img src="uploads/<?php echo $value['item_image'];?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="product-detail.php?pr_id=<?php echo $value['item_id'];?>"><?php echo $value['item_name'];?></a></td>
                        <td>$<?php echo $value['item_price'];?></td>
                        <!-- <td>In Stock</td> -->
                        <td>
                          <div class="add_to_cart">
                          <a name="addToCart" href="handler/addToCart.php?cart_id=<?php echo $value['item_id'];?>&cart_name=<?php echo $value['item_name'];?>&cart_price=<?php echo $value['item_price'];?>&cart_image=<?php echo $value['item_image'];?>"><span class="cart-sign fa fa-cart-plus fa-2x"></span></a>
                          <div class="text">
                            add to cart
                          </div>
                          </div>

                        </td>
                      </tr>
                     <?php }} ?>

                      </tbody>
                  </table>
                </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->


  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
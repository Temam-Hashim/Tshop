<?php require_once "includes/header.php" ; ?>


  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="images/1920X300/banner-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Have a Coupon?
                          </a>
                          <?php
                         $coupon_value=0;
                        if(isset($_POST['apply_coupon'])){
                            $coupon_code = $_POST['coupon_code'];
                            $sql = "SELECT * FROM `coupon` WHERE `cp_code`='$coupon_code'";
                            $cp_result = $connect->query($sql);

                            $cp_row = $cp_result->fetch_array();
                            $cp_count = $cp_result->num_rows;

                          if($cp_count==0){
                            echo "<div class='alert alert-warning alert-dismissible show' role='alert'>
                            <strong color='blue'>Invalid coupon code! please enter valid coupon code for the right discount.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>";

                          }
                          else{
                            $coupon_value = $total*$cp_row['cp_discount']*0.01;
                            echo "  <div class='alert alert-success alert-dismissible show' role='alert'>
                            <strong color='blue'> Congra you got $cp_row[cp_discount]% discount using coupon code `$cp_row[cp_code]`.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times</span>
                            </button></div>";
                          }
                        }



                         ?>
                        </h4>
                      </div>
                      <?php if($coupon_value==0){?>
                        <form action="" method="post">
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <input type="text" placeholder="Coupon Code" name="coupon_code" class="aa-coupon-code" required>
                              <input type="submit" value="Apply Coupon"  name="apply_coupon" class="aa-browse-btn">
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                      </div>

                    <!-- Login section -->
                    <?php if(!isset($_SESSION['customer_id'])){ ?>

                    <div class='alert alert-danger alert-dismissible show' role='alert'>
                            <strong color='blue'>Please Login to procced to checkout.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>

                    <div class="panel panel-default aa-checkout-login">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Client Login
                          </a>
                        </h4>
                      </div>
                      <form action="" method="post">
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Please Login to complete your order</p>
                          <input type="text" placeholder="Username or email" name="email">
                          <input type="password" placeholder="Password" name="password">
                          <button type="submit" class="aa-browse-btn" name="login">Login</button>
                          <a href="account.php"  id="new user" class="btn  btn-md btn-info"> New User ?</a>
                          <p class="aa-lost-password"><a href="forgot.php">Lost your password?</a></p>
                        </div>
                      </div>
                    </div> <?php loginVerify(); } ?>
                    </form>

                    <!-- Billing Details -->
                    <!-- <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="First Name*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Last Name*">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Company name">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">Address*</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <select>
                                  <option value="0">Select Your Country</option>
                                  <option value="1">Australia</option>
                                  <option value="2">Afganistan</option>
                                  <option value="3">Bangladesh</option>
                                  <option value="4">Belgium</option>
                                  <option value="5">Brazil</option>
                                  <option value="6">Canada</option>
                                  <option value="7">China</option>
                                  <option value="8">Denmark</option>
                                  <option value="9">Ethiopia</option>
                                  <option value="10">India</option>
                                  <option value="11">Iran</option>
                                  <option value="12">Israel</option>
                                  <option value="13">Mexico</option>
                                  <option value="14">UAE</option>
                                  <option value="15">UK</option>
                                  <option value="16">USA</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Appartment, Suite etc.">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="City / Town*">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="District*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->

                    <!-- Shipping Address -->
                    <?php
                    if(isset($_SESSION['customer_id'])){
                      $customer_id = $_SESSION['customer_id'];
                      $sql = "SELECT * FROM `address` WHERE `customer_id`='$customer_id'";
                      $result = $connect->query($sql);
                      $row = $result->fetch_array();


                    ?>


                    <div class='alert alert-success alert-dismissible show' role='alert'>
                            <strong color='blue'>Please Check your shipping address or update it
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                    </div>

                  <form action="handler/orderHandler.php" method="POST">
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                         <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="First Name*" name="firstName" value="<?php echo $row['firstName'];?>" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Last Name*" name="lastName" value="<?php echo $row['lastName'];?>" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" name="email" value="<?php echo $row['email'];?>" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" name="phone" value="<?php echo $row['phone'];?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="address" required><?php echo empty($row['address'])? "Address":$row['address'];?></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill" >
                                <select name="country" required>
                                <?php if(!empty($row['country'])){?>
                                  <option value="<?php echo $row['country'];?>"><?php echo $row['country'];?></option>
                                  <?php }else{ ?>
                                  <option value="">Select Country</option>
                                  <?php } ?>
                                  <option value="Australia">Australia</option>
                                  <option value="Afganistan">Afganistan</option>
                                  <option value="Banladesh">Bangladesh</option>
                                  <option value="Belgium">Belgium</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Canada">Canada</option>
                                  <option value="China">China</option>
                                  <option value="denmark">Denmark</option>
                                  <option value="Ethiopia">Ethiopia</option>
                                  <option value="India">India</option>
                                  <option value="Iran">Iran</option>
                                  <option value="Israel">Israel</option>
                                  <option value="Mexico">Mexico</option>
                                  <option value="UAE">UAE</option>
                                  <option value="UK">UK</option>
                                  <option value="USA">USA</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Appartment, Suite etc." name="appartment" value="<?php echo $row['appartment'];?>" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="City / Town*" name="city" value="<?php echo $row['city'];?>" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="state*" name="state" value="<?php echo $row['state'];?>" required>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" name="zip" value="<?php echo $row['zip'];?>" required>
                              </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" name="note" required><?php echo empty($row['note'])? "Special Note":$row['note'];?></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                     $tax = 0;
                     $sub_total = 0;
                    if(isset($_SESSION['cart'])){
                      foreach($_SESSION['cart'] as $key=>$value){
                        $sub_total = $sub_total + $value['item_price']*$value['quantity'];
                        $tax = $total*0.10;

                        $total = $sub_total+$tax-$coupon_value;


                    ?>
                        <tr>
                          <td><?php echo $value['item_name']; ?><strong> x  <?php echo $value['quantity']; ?></strong></td>
                          <td><span aria-hidden='true'>&plus;</span> $<?php echo $value['item_price']; ?></td>
                        </tr>
                        <?php }} ?>

                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td><span aria-hidden='true'>&plus;</span> $<?php echo $sub_total; ?></td>
                        </tr>
                         <tr>
                          <th>Tax</th>
                          <td><span aria-hidden='true'>&plus;</span> $<?php echo $tax; ?></td>
                        </tr>
                        <tr>
                          <th>Coupon</th>
                          <td><span aria-hidden='true'>&minus;</span> $<?php echo $coupon_value; ?></td>
                        </tr>
                         <tr>
                          <th>Total</th>
                          <td><span aria-hidden='true'>&plus;</span> $<?php echo $total ?></td>
                        </tr>

                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">

                      <input type="hidden" value="<?php echo $sub_total;?>" name="subtotal">
                      <input type="hidden" value="<?php echo $tax;?>" name="tax">
                      <input type="hidden" value="<?php echo $coupon_value;?>" name="coupon">

                      <label for="paypal"><input type="radio" id="paypal" name="paymentMethod" checked value="paypal">&nbsp Via Paypal</label>
                      <label for="cashdelivery"><input type="radio" id="cashdelivery" name="paymentMethod" value="cash">&nbsp Cash on Delivery</label><br><br>

                      <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">
                      <input type="submit" class="aa-browse-btn btn-lg btn-block" name="place_order" value="Place Order">

                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

  <!-- footer -->
  <?php require_once "includes/footer.php" ; ?>
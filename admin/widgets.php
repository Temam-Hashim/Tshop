
<div class="row">
            <!-- education widget-->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php $result = getProduct(); ?>
              <h3><?php echo $result->num_rows; ?></h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="view_products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- exprience widget-->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <?php $result = getCategory(); ?>
              <h3><?php echo $result->num_rows; ?><sup style="font-size: 20px"></sup></h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="exprience_view.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- .project widget -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
               <?php $result = getOrder(); ?>
              <h3><?php echo $result->num_rows; ?></h3>
              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="fa fa-desktop"></i>
            </div>
            <a href="project_view.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- service widget-->


               <!-- About widget-->


               <!-- awards widget-->


               <!-- mailbox widget-->

                       <!-- skill widget-->


                       <!-- service widget-->


                              <!-- testimonal widget-->
  
      </div>

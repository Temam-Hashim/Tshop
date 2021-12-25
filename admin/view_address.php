 <!--include header section here-->
 <?php require_once "partials/header.php";?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require_once "partials/side_bar.php";?>
 <!-- Content Wrapper. Contains page content -->
<?php
    if(isset($_GET['cust_id'])){
        $cust_id = $_GET['cust_id'];
        $result = getOrderdetail($cust_id);
        $row = $result->fetch_array();

        $order_counter = $result->num_rows;

}

?>

 <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../<?php echo $row['profile'] ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row['firstName']." ".$row['lastName']; ?></h3>

              <p class="text-muted text-center">Customer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Orders</b> <a class="pull-right"><?php echo $order_counter; ?></a>
                </li>
                <!-- <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul> -->

              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Name</strong>
                <p class="text-muted"><?php echo $row['firstName']." ".$row['lastName']; ?></p>
            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                <p class="text-muted"><a href="mailto:<?php echo $row['username']; ?>"><?php echo $row['username']; ?></a></p>
                <strong><i class="fa fa-phone margin-r-5"></i> Mobile</strong>
                <p class="text-muted"><?php echo $row['phone']; ?></p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $row['address']; ?></p>

              <hr>


              <strong><i class="fa fa-file-text-o margin-r-5"></i>Special Notes</strong>

              <p><?php echo $row['note']; ?> </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li><a href="#address" data-toggle="tab">Address</a></li>
              <li class="active"><a href="#previous_order" data-toggle="tab">Order Summary</a></li>
              <li><a href="#order_tracker" data-toggle="tab">Order Trcker</a></li>
            </ul>
            <div class="tab-content">


<!-- address tab -->
<div class="active tab-pane" id="address">
                <form class="form-horizontal">

                    <div class="row">

                        <div class="col-md-6">
                            <legend>USER TAG</legend>
                            <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">User Id</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control circle" id="inputName" value="<?php echo $row['cust_id'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control circle" id="inputName" value="<?php echo $row['firstName'];?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control circle" id="inputName" value="<?php echo $row['lastName']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $row['email']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName"  value="<?php echo $row['phone']; ?>" readonly>
                                    </div>
                                </div>

                        </div>
                        <div class="col-md-6">
                            <legend>ADDRESS TAG</legend>
                                 <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Country</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control circle" id="inputName"  value="<?php echo $row['country']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">State</label>

                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail"  value="<?php echo $row['state']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">City</label>

                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName"  value="<?php echo $row['city']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Zip Code</label>

                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName"  value="<?php echo $row['zip']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" readonly> <?php echo $row['address']; ?></textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                </form>
              </div>
<!-- previous order tab -->
              <div class="tab-pane" id="previous_order">
                <!-- Post -->
                <?php  while($final = $result->fetch_assoc()){ ?>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../<?php echo $final['picture']; ?>" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $final['pr_name'];?></a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Ordered on - <?php echo $final['created_at'] ;?></span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <?php echo $final['description'];?>
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i>Price:</i>$<?php echo $final['price'];?></a></li>
                    <li><a href="#" class="link-black text-sm"><i>Type:</i><?php echo $final['type'];?></a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="">category:</i><?php echo $final['cat_name'];  ?></a></li>
                  </ul>
                </div>
                <?php } ?>
                <!-- /.post -->
                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Send Message">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>


                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="order_tracker">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
 <?php require_once "partials/footer.php" ?>
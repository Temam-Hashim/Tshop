 <!--include header section here-->
 <?php require_once "partials/header.php";?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require_once "partials/side_bar.php";?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Welcome
        <small><?php echo $_SESSION['admin_username']; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders</li>
      </ol>
    </section>
<?php
    if(isset($_POST['delete_product'])){
        $delete_product = deleteProduct();
        if($delete_product){
            echo "<div class='alert alert-success text-center'>product deleted Successfully</div>";
        }else{
            echo "<div class='alert alert-danger text-center'>Failed to delete product try again</div>";
        }
    }

  ?>

    <!-- Main content -->
    <section class="content">

    <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <a class="btn btn-info" href="add_products.php">Add New Product</a> -->

    </div>

        <div class="row">

          <div class="col-sm-12">
            <div class="table table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>product Name</th>
                      <th>product Id</th>
                      <th>Total</th>
                      <th>Tax</th>
                      <th>Address</th>
                      <th>payment Method</th>
                      <th>payment Status</th>
                      <th>delivery Status</th>
                      <!-- <th colspan="3">Action</th> -->
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $orders = getOrder();

                    $count = 1;
                    while($row = $orders->fetch_assoc()){
                      $order_id = $row['order_id'];

                    ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row['pr_name'] ?></td>
                      <td><?php echo $row['pr_id'] ; ?></td>
                      <td>$<?php echo $row['total']; ?></td>
                      <td>$<?php echo $row['tax']; ?></td>
                      <td><a href="view_address.php?cust_id=<?php echo $row['cust_id'];?>" title="view address"><?php echo $row['address']; ?></a></td>
                      <td><?php echo $row['payment_method']; ?></td>
                      <td><?php echo $row['payment_status']; ?></td>
                      <form action="" method="GET">
                      <td>

                          <div class="form-group">
                          <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                          <select name="del_stat" id="del_stat" class="form-control" onchange="this.form.submit();">
                          <option value=" <?php echo $row['delivary_status']; ?>"> <?php echo $row['delivary_status']; ?></option>
                          <option value="Accepted">Accepted</option>
                          <option value="Dispached"> Dispached</option>
                          <option value="Shipped"> Shipped</option>
                          <option value="On The Way"> On The Way</option>
                          <option value="Delivered">Delivered</option>

                          </select>

                          </div>


                      </td>
                      </form>

                    </tr>
                    <?php $count++; } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <!-- <th>Product</th>
                      <th>Category</th>
                      <th>review</th>
                      <th>System</th>
                      <th>Analysis</th> -->
                    </tr>
                    </tfoot>
                  </table>
             </div>

            </div>
        </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- update product status directly from table -->

<?php
// function call

deliveryStatus();

?>


  <?php require_once 'partials/footer.php'; ?>
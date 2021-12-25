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
        <li class="active">Product</li>
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
              <a class="btn btn-info" href="add_products.php">Add New Product</a>

    </div>

        <div class="row">

          <div class="col-sm-12">
            <div class="table table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>type</th>
                      <th>tag</th>
                      <th>Picture</th>
                      <th>Category</th>
                      <th colspan="3">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $products = getProduct();
                    while($row = $products->fetch_assoc()){
                      $pr_id = $row['pr_id'];
                      $pr_name = $row['pr_name'];
                      $pr_price = $row['price'];
                      $pr_pic = explode(',',$row['picture']);
                      // foreach($pr_pic as $pic){
                      //   $pic = $pic;
                      // }
                      $pr_desc = $row['description'];
                      $pr_cat = $row['category_id'];
                      $pr_tag = $row['tags'];
                      $pr_type = $row['type'];




                     ?>
                    <tr>
                      <td><?php echo $pr_id; ?></td>
                      <td><?php echo $pr_name; ?></td>
                      <td><?php echo $pr_price; ?></td>
                      <td><?php echo $pr_type; ?></td>
                      <td><?php echo $pr_tag; ?></td>
                      <td><img src="../uploads/<?php echo $pr_pic[0]; ?>" alt="" width="100" height="100"></td>

                      <td><?php echo $pr_cat; ?></td>

                      <td><a class="btn btn-primary" href="preview_product.php?pr_id=<?php echo $pr_id; ?>">Preview</a></td>
                        <!-- edit product -->
                      <td>
                        <form action="edit_product.php" method="POST">
                          <input type="hidden" name="pr_id" value="<?php echo $pr_id; ?>">
                          <input type="submit" class="btn btn-info" value="Edit">
                        </form>
                      </td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="pr_id" value="<?php echo $pr_id;?>">
                          <input type="submit" class="btn btn-danger" name="delete_product" value="Delete"
                          onclick="return confirm('Are you sure you want to delete this Item?')">
                        </form>

                      </td>
                    </tr>
                    <?php } ?>
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
  <?php require_once 'partials/footer.php'; ?>
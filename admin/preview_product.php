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

    <!-- Main content -->
    <section class="content">

    <div class="box box-primary">
            <div class="box-header with-border">
              <a class="btn btn-info" href="add_products.php">Add New Product</a>
              <a class="btn btn-info" href="view_products.php">View  Products</a>

    </div>

        <div class="row" style="margin:22px;">
        <?php
            if(isset($_GET['pr_id'])){
                $id = $_GET['pr_id'];
                $product = getSingleProduct($id);
                $row = $product->fetch_array();
                $pr_pic = explode(",",$row['picture']);

                //<!-- get category from category table -->
                $cat_id = $row['category_id'];

                $category = getSingleCategory($cat_id);
                $cat_row = $category->fetch_array();
            }
        ?>

          <div class="col-sm-6">
              <h3>Name: <span class="text-warning"><?php echo $row['pr_name']; ?></span></h3><hr><br>
              <h3>Category: <span class="text-danger"><?php echo $cat_row['cat_name']; ?></span></h3><hr><br>
              <p><?php echo substr($row['description'],0,220); ?><a class="btn btn-info btn-sm" href="#">Read More</a></p><hr><br>

          </div>

          <div class="col-sm-6">
          <h3><img style="max-width:300px;max-height:300px" src="../uploads/<?php echo $pr_pic[0]; ?>" alt=""></h3><hr>
          <h3>Price: <?php echo $row['price']; ?></h3><hr>


          </div>
        </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'partials/footer.php'; ?>
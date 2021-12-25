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
        <li class="active">Update Product</li>
      </ol>
    </section>

 <?php
// update product
if(isset($_POST['update_product'])){

    $update_product = updateProduct();
    if($update_product){
        echo "<div class='alert alert-success text-center'>product Updated: <a href='view_products.php'> view product</a></div>";
    }else{
        echo "<div class='alert alert-danger text-center'>Failed to update product try again or <a href='view_products.php'>view product</a></div>";
    }
}
// fetch product to edit page
    if(isset($_POST['pr_id'])){
        $id = $_POST['pr_id'];
        $product = getSingleProduct($id);
        $row = $product->fetch_array();

        $tags = explode(",",$row['tags']);




?>

    <!-- Main content -->
    <section class="content">

    <div class="box box-primary">
            <div class="box-header with-border">
              <a class="btn btn-info" href="add_products.php">Add New Product</a>
              <a class="btn btn-info" href="view_products.php">View  Products</a>

    </div>

        <div class="row">
            <div class="col-sm-2"></div>

          <div class="col-sm-8">

          <form role="form" action="" method="POST" enctype="multipart/form-data">
          <legend class="text-center">Edit Product</legend>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="pr_id" value="<?php echo $row['pr_id']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter product Name" name="product_name" value="<?php echo $row['pr_name'];?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price" name="product_price" value="<?php echo $row['price'];?>">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="picture">Picture</label>
                                <input type="file" id="picture" name="product_picture[]" multiple required>
                            </div>
                            <div class="col-md-6">
                                <img src="../<?php echo $row['picture'];?>" width="100" height="100">
                                <span><small class="text-primary">you can select multiple image</small></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" cols="30" rows="10" placeholder="Enter description" name="product_desc"><?php echo $row['description'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="product_cat">
                                <option value="<?php echo $row['category_id'];?>">select</option>
                                <?php
                                    $cat_result = getCategory();
                                    while ($row1 = $cat_result->fetch_assoc()){
                                        $cat_id = $row1['cat_id'];
                                        $cat_name = $row1['cat_name'];
                                        echo "<option value='$cat_id'>$cat_name</option>";
                                    }

                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Product Tag</label>
                            <select class="form-control select2" id="tag" name="product_tag[]" multiple="multiple" place-holder="you can select multiple tag">

                                <?php
                                foreach($tags as $tags){
                                     echo "<option value='$row[tags]' selected> $tags </option>";
                                }
                                    $cat_result = getTag();
                                    while ($row2 = $cat_result->fetch_assoc()){
                                        $tag_id = $row2['id'];
                                        $tag_name = $row2['name'];
                                            echo "<option value='$tag_name'>$tag_name</option>";

                                    }

                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Product Type</label>
                            <select class="form-control" id="tag" name="product_type">
                                <option value="<?php echo $row['type'];?>" selected><?php echo $row['type'];?></option>
                               <option value="men">Men</option>
                               <option value="women">Women</option>
                               <option value="home">Home</option>
                               <option value="electronics">Electronics</option>
                               <option value="appliance">Appliance</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="update_product">Update</button>
                    </div>
                </form>

<?php } ?>
           </div>

            <div class="col-sm-2"></div>
        </div>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'partials/footer.php'; ?>
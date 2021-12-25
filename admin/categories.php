 <!--include header section here-->
 <?php require_once "partials/header.php";?>
  <!-- Left side column. contains the logo and sidebar -->
<?php require_once "partials/side_bar.php";?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- /.box-header -->
            <!-- form start -->
        <div class="box box-primary">
                <div class="box-header with-border text-center">
                <h3 class="box-title text-primary">Category Page</h3>
                <?php
                    insertCategory();
                    if(isset($_GET['warning'])){
                        echo $_GET['warning'];
                    }

                    if(isset($_POST['delete_cat'])){
                      $delete_cat = deleteCategory();
                      if($delete_cat){
                        $warning = "<div class='alert alert-success text-center'>Category deleted successfully </div>";
                        header("Location:categories.php?warning=$warning");
                      }else{
                        echo "<div class='alert alert-danger text-center'>Failed to Delete Category try again </div>";
                      }
                    }
                ?>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                  <div class="table table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th colspan="2">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $category = getCategory();
                    while($row = $category->fetch_assoc()){
                      $cat_id = $row['cat_id'];
                      $cat_name = $row['cat_name'];
                     ?>
                    <tr>
                      <td><?php echo $cat_id; ?></td>
                      <td><?php echo $cat_name; ?></td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
                          <input type="submit" class="btn btn-info" name="update_cat" value="Edit">
                        </form>

                      </td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="cat_id" value="<?php echo $cat_id;?>">
                          <input type="submit" class="btn btn-danger" name="delete_cat" value="Delete"
                          onclick="return confirm('Are you sure you want to delete this Category?')">
                        </form>

                      </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Product</th>
                      <th>Category</th>
                      <th>review</th>
                      <th>System</th>
                    </tr>
                    </tfoot>
                  </table>

                  </div>

                </div>
                <div class="col-md-6">

                <form role="form" action="" method="POST" >
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category">Add Category</label>
                                <input type="text" class="form-control" id="category" placeholder="Enter category" name="category">
                            </div>
                            <span class="btn-group">
                                <button type="submit" class="btn btn-primary" name="catbtn">Submit</button>
                            </span>
                        </div>

                        <div class="box-footer">
                        </div>
                    </form>
                        <!-- /.box-body -->

                          <!--update category -->
                          <?php
                            if(isset($_POST['update_cat'])){
                              $cat_id = $_POST['cat_id'];
                              $category = getSingleCategory($cat_id);
                              $row = $category->fetch_array();
                              $cat_name = $row['cat_name'];
                            ?>

                         <form role="form" action="" method="POST" >
                        <div class="box-body">
                            <div class="form-group">
                                <label for="category">Update Category</label>
                                <input type="hidden" name="cat_id" value="<?php echo $cat_id;?>">
                                <input type="text" class="form-control" id="category" name="cat_name" value="<?php echo $cat_name; ?>">
                            </div>
                            <span class="btn-group">
                                <button type="submit" class="btn btn-primary" name="edit_cat">Update</button>
                            </span>
                          </div>

                          <?php } ?>

                        <div class="box-footer">
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['edit_cat'])){
                       $cat_update = updateCategory();
                       if($cat_update){
                        $warning = "<div class='alert alert-success text-center'>Category deleted successfully </div>";
                         header("Location:categories.php?warning=$warning");


                        }else{
                            echo "<div class='alert alert-danger text-center'>Failed to update Category try again </div>";
                        }
                    }


                    ?>


                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
  </div>
<!-- insert category -->




  <!-- /.content-wrapper -->
  <?php require_once 'partials/footer.php'; ?>
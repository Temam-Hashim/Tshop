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


    <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title text-primary">Add Products</h3>
    </div>
                  <?php
                    insertProduct();
                    // if(isset($_GET['warning'])){
                    //     echo $_GET['warning'];
                    // }
                ?>

            <!-- /.box-header -->
            <!-- form start -->
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-md-8">
                 <form role="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter product Name" name="product_name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Enter Price" name="product_price">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="picture">Picture</label>
                                <input type="file" id="picture" class='alert alert-success alert-dismissible show' role='alert'  name="product_picture[]" multiple><br>
                               <div class="imgGallery" id="imgGallery"> </div>
                            </div>

                                <div class="form-group col-md-6">
                                    <label for="add_image">Add Image</label><br>
                                    <input type="button" id="add_image" name="add_image" class="fa fa-plus" value="+" onclick="addImageButton();">
                                    <span><small class="text-primary">you can upload multiple Images Here</small></span>
                                </div>

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" cols="30" rows="10" placeholder="Enter description" name="product_desc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="product_cat">
                                <?php
                                    $cat_result = getCategory();

                                    while ($row = $cat_result->fetch_assoc()){
                                        $cat_id = $row['cat_id'];
                                        $cat_name = $row['cat_name'];
                                        echo "<option value='$cat_id'>$cat_name</option>";
                                    }

                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Product Tag</label>
                            <select class="form-control select2" id="tag" name="product_tag[]" multiple="multiple" place-holder="select multiple tag">
                                <?php
                                    $cat_result = getTag();

                                    while ($row = $cat_result->fetch_assoc()){
                                        $tag_id = $row['id'];
                                        $tag_name = $row['name'];
                                        echo "<option value='$tag_name'>$tag_name</option>";
                                    }

                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Product Type</label>
                            <select class="form-control" id="tag" name="product_type">
                                <option value="">Select</option>
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
                        <button type="submit" class="btn btn-primary" name="product_btn">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>



    </section>
    <!-- /.content -->
  </div>


<script type="text/JavaScript">
        function addImageButton() {
            // First create a DIV element.
            var txtNewInputBox = document.createElement('div');

            // Then add the content (a new input box) of the element.
            txtNewInputBox.innerHTML = "<input type='file' class='alert alert-success alert-dismissible show' role='alert' id='picture' name='product_picture[]'></span></button>";

            // Finally put it where it is supposed to appear.
            document.getElementById("imgGallery").appendChild(txtNewInputBox);
        }


</script>

  <?php require_once 'partials/footer.php'; ?>
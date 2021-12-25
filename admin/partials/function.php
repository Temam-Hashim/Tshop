<?php

require_once "../includes/db.php";


function Login(){
    global $connect;
    if(isset($_POST['login'])){
        $email = $connect->real_escape_string($_POST['email']);
        $password = $connect->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM `admin` WHERE `username`='$email' AND `password`='$password'";
        $login_result = $connect->query($sql);
        $row = $login_result->fetch_array();
        $email_db = $row['username'];
        $password_db = $row['password'];

        if($email==$email_db && $password==$password_db){
            $_SESSION['admin_username'] = $email_db;
            $_SESSION['admin_password'] = $password_db;
            header("Location:index.php");
        }else{
            header("Location: admin_login.php?warning='<div class='alert alert-danger text-center'>invalid Email or password</div>'");
        }
    }

}
function insertCategory(){
    global $connect;
    if(isset($_POST['catbtn'])){
        $cat_name = $connect->real_escape_string($_POST['category']);

        if(empty($cat_name)){
            header("Location: categories.php?warning='<div class='alert alert-danger'>Please enter category name</div>'");
        }
        else{
            $sql = "INSERT INTO `categories`(`cat_name`) VALUES('$cat_name')";
            $result = $connect->query($sql);

            if($result){
                header("Location: categories.php?warning='<div class='alert alert-success'>category Inserted</div>'");
            }else{
                header("Location: categories.php?warning='<div class='alert alert-danger'>category Not  Inserted! try again</div>'");
            }
        }

    }
}
function insertProduct(){
    global $connect;
    if(isset($_POST['product_btn'])){
        $product_name = $connect->real_escape_string($_POST['product_name']);
        $product_price = $connect->real_escape_string($_POST['product_price']);
        $product_desc = $connect->real_escape_string($_POST['product_desc']);
        $product_cat = $connect->real_escape_string($_POST['product_cat']);
        $product_type = $connect->real_escape_string($_POST['product_type']);
        $product_tag = implode(',', (array)$_POST['product_tag']);


        $file_name = $_FILES['product_picture']['name'];
        $file_path = implode(",",(array)$file_name);


        $uploadDir = "../uploads/";
        foreach($_FILES['product_picture']['name'] as $key=>$value){
            $filename = basename($_FILES['product_picture']['name'][$key]);
            $target_path = $uploadDir.$filename;
            move_uploaded_file($_FILES['product_picture']['tmp_name'][$key],$target_path);

        }

        if(empty($product_name)){
            header("Location: add_products.php?warning='<div class='alert alert-danger text-center'>Please enter product name</div>'");
        }
        else if(empty($product_price)){
            header("Location: add_products.php?warning='<div class='alert alert-danger text-center'>Please enter product Price</div>'");
        }
        else if(empty($product_desc)){
            header("Location: add_products.php?warning='<div class='alert alert-danger text-center'>Please enter product description</div>'");
        }
        else if(empty($product_cat)){
            header("Location: add_products.php?warning='<div class='alert alert-danger text-center'>Please select product category</div>'");
        }
        else{
            $sql = "INSERT INTO `products`(`pr_name`, `price`, `description`, `category_id`,`tags`,`type`,`picture`)
             VALUES ('$product_name','$product_price','$product_desc','$product_cat','$product_tag','$product_type','$file_path')";
            $result = $connect->query($sql);

            if($result){
                echo "<script>
                        alert('Product Inserted');

                     </script>";
            }else{
                echo mysqli_error($connect);
                // window.location.href='view_products.php';
            }

        }
    }

 }
function getProduct(){
    global $connect;
    $sql = "SELECT * FROM `products`";
    $product_result = $connect->query($sql);
    return $product_result;

}
function getSingleProduct($id){
    global $connect;
    $sql = "SELECT * FROM `products` WHERE pr_id='$id'";
    $product_result = $connect->query($sql);
    return $product_result;

}
function updateProduct(){
    global $connect;
    if(isset($_POST['update_product'])){
        $pr_id = $connect->real_escape_string($_POST['pr_id']);
        $pr_name = $connect->real_escape_string($_POST['product_name']);
        $pr_price = $connect->real_escape_string($_POST['product_price']);
        $pr_desc = $connect->real_escape_string($_POST['product_desc']);
        $pr_cat = $connect->real_escape_string($_POST['product_cat']);
        $pr_type = $connect->real_escape_string($_POST['product_type']);

        $product_tag = implode(',', (array)$_POST['product_tag']);


        $file_name = $_FILES['product_picture']['name'];
        $file_path = implode(",",(array)$file_name);

        $uploadDir = "../uploads/";
        foreach($_FILES['product_picture']['name'] as $key=>$value){
            $filename = basename($_FILES['product_picture']['name'][$key]);
            $target_path = $uploadDir.$filename;
            move_uploaded_file($_FILES['product_picture']['tmp_name'][$key],$target_path);

        }




        if( empty($file_path)){
            $pic_query = "SELECT * FROM `products`  WHERE pr_id='$pr_id'";
            $pic_result = $connect->query($pic_query);
            $pic_row = $pic_result->fetch_array();
            $file_path = $pic_row['picture'];

        }



        $sql = "UPDATE `products` SET
               `pr_name`='$pr_name',
               `price`='$pr_price',
               `picture`='$file_path',
               `description`='$pr_desc',
               `category_id`='$pr_cat',
               `tags`='$product_tag',
               `type`='$pr_type'
                WHERE `pr_id`=$pr_id";
        $result = $connect->query($sql);

        return $result;

    }

}
function deleteProduct(){
    $id = $_POST['pr_id'];
    global $connect;
    if(isset($_POST['delete_product']))
    {
        $sql = "DELETE FROM `products` WHERE `pr_id`=$id";
        $result = $connect->query($sql);

        return $result;

    }



}

function getCategory(){
    global $connect;
    $sql = "SELECT * FROM `categories`";
    $cat_result = $connect->query($sql);
    return $cat_result;

}
function getTag(){
    global $connect;
    $sql = "SELECT * FROM `tags`";
    $cat_result = $connect->query($sql);
    return $cat_result;

}
function getSingleCategory($id){
    global $connect;
    $sql = "SELECT * FROM `categories` WHERE `cat_id`=$id";
    $cat_result = $connect->query($sql);
    return $cat_result;

}

function updateCategory(){
    global $connect;
    if(isset($_POST['edit_cat'])){
        $cat_id = $connect->real_escape_string($_POST['cat_id']);
        $cat_name = $connect->real_escape_string($_POST['cat_name']);

        $sql = "UPDATE `categories` SET `cat_name`='$cat_name' WHERE `cat_id`=$cat_id";

        $result = $connect->query($sql);

        return $result;

    }

}
function deleteCategory(){
    $id = $_POST['cat_id'];
    global $connect;
    if(isset($_POST['delete_cat']))
    {
        $sql = "DELETE FROM `categories` WHERE `cat_id`=$id";
        $result = $connect->query($sql);

        return $result;

    }



}


function categoryCounter(){
    global $connect;
    $sql = "SELECT * FROM `categories`";
    $cat_result = $connect->query($sql);
    return $cat_result->num_rows;

}
function productCounter(){
    global $connect;
    $sql = "SELECT * FROM `products`";
    $product_result = $connect->query($sql);
    return $product_result->num_rows;

}
function orderCounter(){
    global $connect;
    $sql = "SELECT * FROM `orders`";
    $order_result = $connect->query($sql);
    return $order_result->num_rows;

}

// order section

function getOrder(){
    global $connect;
    $sql = "SELECT * FROM `orders` ord inner join `customers` cust on cust.cust_id=ord.customer_id
    inner join `order_details` det on det.order_id=ord.id inner join `products` prd on prd.pr_id=det.product_id inner join `address` ad on ad.add_id=ord.address_id ";
    $order_result = $connect->query($sql);
    return $order_result;
}
function getOrderdetail($id){
    global $connect;
    $sql = "SELECT * FROM `orders` ord inner join `customers` cust on cust.cust_id=ord.customer_id
    inner join `order_details` det on det.order_id=ord.id inner join `products` prd on prd.pr_id=det.product_id inner join `address` ad on ad.add_id=ord.address_id
     inner join `categories` cat on cat.cat_id=prd.category_id  WHERE cust.cust_id='$id'";
    $order_result = $connect->query($sql);
    return $order_result;

}

// update delivary status
function deliveryStatus(){
    global $connect;
    if(isset($_GET['del_stat'])){
        $del_stat = $_GET['del_stat'];
        $order_id = $_GET['order_id'];
        $sql = "UPDATE `order_details` SET `delivary_status`='$del_stat' WHERE `order_id`='$order_id'";
        $result = $connect->query($sql);
         header("location:view_orders.php");
    }
}






?>
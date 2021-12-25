<?php


    function getSingleCategory($id){
        global $connect;
        $sql = "SELECT * FROM `categories` WHERE `cat_id`=$id";
        $cat_result = $connect->query($sql);
        return $cat_result;

    }

    function getAllCategory(){
        global $connect;
        $sql = "SELECT * FROM `categories`";
        $result = $connect->query($sql);
        return $result;

    }
    function getAllProduct(){
        global $connect;
        $sql = "SELECT * FROM `products`";
        $result = $connect->query($sql);
        return $result;

    }
    function UpdateView($pr_id){
        global $connect;
        $sql = "UPDATE `products` SET `views_counter`=`views_counter`+1 WHERE `pr_id`=$pr_id";
        $result = $connect->query($sql);
    }
    function UpdateRating($pr_id){
        global $connect;
        $sql = "SELECT avg(rating) as rating FROM `product_rating` WHERE `product_id`=$pr_id";
        $result = $connect->query($sql);
        $row = $result->fetch_array();
        $rating = round($row['rating'],1);

        $sql2 = "UPDATE `products` SET `rating`='$rating' WHERE `pr_id`=$pr_id";
        $result2 = $connect->query($sql);
    }


    function checkUser($email){
        $sql = "SELECT `username` FROM `customers` WHERE `username`='$email'";
        $result = $connect->query($sql);
        $counter = $result->num_rows;
        return $counter();
    }
    function loginVerify(){
        global $connect;
        if(isset($_POST['login'])){
            $email = $connect->real_escape_string($_POST['email']);
            $password = $connect->real_escape_string($_POST['password']);

            $sql = "SELECT * FROM `customers` WHERE `username`='$email'";
            $result = $connect->query($sql);
            $row = $result->fetch_array();
            $id_db = $row['cust_id'];
            $username_db =$row['username'];
            $password_db = $row['password'];
            if($result->num_rows>0){
                if($password === $password_db){
                    $_SESSION['customer_id'] =  $id_db;
                    $_SESSION['customer_username'] =  $username_db;
                    $_SESSION['customer_password'] =  $password_db;

                    echo "<script>
                        alert('Login Success');
                        window.location.href='checkout.php';
                        </script>";
                }else{

                    echo "<script>
                    alert('Login Failed! Invalid username or password');
                    window.location.href='checkout.php';
                    </script>";
                }

            }else{

                echo "<script>
                alert('Login Failed! User Doesn't Exist');
                window.location.href='checkout.php';
                </script>";
            }
        }

    }




?>
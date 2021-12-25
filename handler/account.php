<?php
require_once "../includes/db.php";
require_once "../phpMailer/mailer.php";
session_start();
// login handler

function checkUser($email){
    $sql = "SELECT `username` FROM `customers` WHERE `username`='$email'";
    $result = $connect->query($sql);
    $counter = $result->num_rows;
    return $counter();
}
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
                    window.location.href='../cart.php';
                    </script>";
            }else{
                $message = "<div class='alert alert-danger'>Login Failed! Invalid username or password </div>";
                header("Location:../account.php?message=$message");
            }

        }else{
            $message = "<div class='alert alert-danger'>Login Failed! User Doesn't Exist</div>";
            header("Location:../account.php?message=$message");
        }
    }






// register handler
if(isset($_POST['register'])){
    $email = $connect->real_escape_string($_POST['email']);
    $password = $connect->real_escape_string($_POST['password']);
    // check if user exist
    $userCounter = checkUser($email);
    if($userCounter>0){
        echo "<div class='alert alert-success'>This User is Already Registered please recover your Password or Login</div>";
    }else{

        $sql = "INSERT INTO `customers`(`username`, `password`)
        VALUES ('$email','$password')";
        $result = $connect->query($sql);
        if($result){
        single_mail('ourgroupemail2018@gmail.com',$email,"New User Regestered","New User Has been registered to Tshop shopping site");
            echo "<script>
                alert('Registration Success check your Email for confirmation');
                window.location.href='../account.php';
                </script>";
        }else{
        echo "<script>
                alert('Registration Failed Try Again Later!');
                window.location.href='../account.php';
            </script>";
        }

    }

}


?>
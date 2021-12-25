<?php
session_start();
require_once "../includes/db.php";


if(isset($_POST['place_order'])){
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
        echo "<script>alert('NO Item found for checkout please add product to procced!');
            window.location.href='../product.php';
            </script>";

    }

        $customer_id = $_SESSION['customer_id'];
        //  address list
        $firstName = $connect->real_escape_string($_POST['firstName']);
        $lastName = $connect->real_escape_string($_POST['lastName']);
        $email = $connect->real_escape_string($_POST['email']);
        $phone = $connect->real_escape_string($_POST['phone']);
        $address = $connect->real_escape_string($_POST['address']);
        $country = $connect->real_escape_string($_POST['country']);
        $appartment = $connect->real_escape_string($_POST['appartment']);
        $city = $connect->real_escape_string($_POST['city']);
        $state = $connect->real_escape_string($_POST['state']);
        $zip = $connect->real_escape_string($_POST['zip']);
        $note= $connect->real_escape_string($_POST['note']);

        // payment method
        $payment_method = $_POST['paymentMethod'];
        // total price including tax
        $subTotal = $connect->real_escape_string($_POST['subtotal']);
        $tax = $connect->real_escape_string($_POST['tax']);
        $coupon = $connect->real_escape_string($_POST['coupon']);
        $total = $subTotal+$tax-$coupon;
    // check if address is already exist or not
        $check_sql = "SELECT * FROM `address` WHERE `customer_id`='$customer_id'";
        $check_rlt = $connect->query($check_sql);
        $row = $check_rlt->fetch_array();
        $address_id = $row['add_id'];
        if($check_rlt->num_rows==0){
        $sql1 = "INSERT INTO `address`(`customer_id`, `firstName`, `lastName`, `email`, `phone`, `address`, `country`, `appartment`, `city`, `state`, `zip`, `note`)
        VALUES ('$customer_id','$firstName','$lastName','$email','$phone','$address','$country','$appartment','$city','$state','$zip','$note')";
        $res1 = $connect->query($sql1);

        }else{
            $update_sql ="UPDATE `address` SET `firstName`='$firstName',`lastName`='$lastName',
            `email`='$email',`phone`='$phone',`address`='$address',`country`='$country',
            `appartment`='$appartment',`city`='$city',`state`=$state,`zip`='$zip,
            `note`='$note' WHERE `customer_id`='$customer_id'";
            $update_rlt = $connect->query($update_sql);
        }
    // insert into order
        $order_sql = "INSERT INTO `orders`(`customer_id`, `address_id`, `total`,`tax`,`payment_method`,`coupon`) VALUES ('$customer_id','$address_id','$total','$tax','$payment_method','$coupon')";
        $order_rlt = $connect->query($order_sql);

    // fetch data from order firts
        $sql2 = "SELECT * FROM `orders` order by `id` DESC limit 1";
        $res2 = $connect->query($sql2);
        $row2 = $res2->fetch_assoc();
        $order_id = $row2['id'];

    // now insert all product in the cart to order detail with inserted order id
    foreach($_SESSION['cart'] as $key=>$value){
        $sql3 = "INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`)
                 VALUES ('$order_id','$value[item_id]','$value[quantity]')";
        $rlt3 = $connect->query($sql3);


    }
    if($rlt3){
        if($payment_method=='paypal'){
            $_SESSION['total'] = $total;
            header("location: paypal.php");

        }else if($payment_method=='cash'){
            echo "<script>
            alert('Order Placed Check your Email for order Confirmation');
            window.location.href='../index.php';

         </script>";


        }

    }
    unset($_SESSION['cart']);

    }











?>
<?php
session_start();

    if(isset($_SESSION['cart'])){
        $checker = array_column($_SESSION['cart'],'item_name');
        if(in_array($_GET['cart_name'],$checker)){
            echo "<script>
                    alert('Product already Exist in a cart');
                    window.location.href='../cart.php';
                 </script>";
                 exit();
        }
        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array('item_id'=>$_GET['cart_id'],'item_name'=>$_GET['cart_name'],'item_price'=>$_GET['cart_price'],'item_image'=>$_GET['cart_image'],'quantity'=>1);
        echo "<script>
        alert('Item added');
        window.location.href='../cart.php';
        </script>";
    }else{
        $_SESSION['cart'][0]=array('item_id'=>$_GET['cart_id'],'item_name'=>$_GET['cart_name'],'item_price'=>$_GET['cart_price'],'item_image'=>$_GET['cart_image'],'quantity'=>1);
    }
    echo "<script>
    alert('Item added');
    window.location.href='../cart.php';
    </script>";

    // session_destroy();

?>
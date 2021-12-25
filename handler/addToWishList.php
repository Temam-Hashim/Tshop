<?php
session_start();

    if(isset($_SESSION['wish'])){
        $checker = array_column($_SESSION['wish'],'item_id');
        if(in_array($_GET['wish_id'],$checker)){
            echo "<script>
                    alert('Product already Exist in a wish List');
                    window.history.go(-1);
                 </script>";
                 exit();
        }
        $count = count($_SESSION['wish']);
        $_SESSION['wish'][$count] = array('item_id'=>$_GET['wish_id'],'item_name'=>$_GET['wish_name'],'item_price'=>$_GET['wish_price'],'item_image'=>$_GET['wish_image']);
        echo "<script>
        alert('Item added to wishlist');
        window.history.go(-1);
        </script>";
    }else{
        $_SESSION['wish'][0]=array('item_id'=>$_GET['wish_id'],'item_name'=>$_GET['wish_name'],'item_price'=>$_GET['wish_price'],'item_image'=>$_GET['wish_image'],);
    }

    echo "<script>
    alert('Item added to wishlist');
    window.history.go(-1);
    </script>";

    // session_destroy();
?>
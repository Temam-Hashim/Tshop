<?php
session_start();

// remove product from wish list
function removeWishList(){
    if(isset($_POST['remove'])){
        foreach($_SESSION['wish'] as $key=>$value){
        if($value['item_id'] == $_POST['item_id']){
        unset($_SESSION['wish'][$key]);
        $_SESSION['wish'] = array_values($_SESSION['wish']);

        echo "<script>
                alert('Item Removed from wishlist');
                window.history.go(-1);
                </script>";
           }
        }
    }
}
// remove product from wish list
function removeWishListByGet(){
    if(isset($_GET['wish_id'])){
        foreach($_SESSION['wish'] as $key=>$value){
        if($value['item_id'] == $_GET['wish_id']){
        unset($_SESSION['wish'][$key]);
        $_SESSION['wish'] = array_values($_SESSION['wish']);

        echo "<script>
                alert('Item Removed from wishlist');
                window.history.go(-1);
                </script>";
           }
        }
    }

}

// function call
removeWishList();
removeWishListByGet()

?>
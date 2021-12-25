<?php
session_start();

// remove product from cart
function removeCart(){
    if(isset($_POST['remove'])){
        foreach($_SESSION['cart'] as $key=>$value){
        if($value['item_name'] == $_POST['item_name']){
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        echo "<script>
                alert('Item Removed');
                window.location.href='../cart.php';
                </script>";
           }
        }
    }
}
//update cart quantity
function updateCart(){
    if(isset($_POST['update_cart'])){

        // $qty = $_POST['quantity'];

        foreach($_SESSION['cart'] as $key=>$value){
            if($value['item_name'] == $_POST['item_name']){
              $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];

              echo "<script>
                    alert('Item Updated');
                    window.location.href='../cart.php';
                    </script>";
            }
        }
    }
}




// function call
removeCart();
updateCart();
?>
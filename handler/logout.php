<?php
     session_start();
    unset($_SESSION['customer_id']);
    unset($_SESSION['customer_username']);
    unset($_SESSION['customer_password']);
    header("Location:../index.php");

?>
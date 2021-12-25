<?php
    session_start();
    if(isset($_SESSION['admin_email']) && isset($_SESSION['admin_password'])){
        header("Location:admin_index.php");
    }
    if(empty($_SESSION['admin_email']) && empty($_SESSION['admin_password'])){
        header("Location:admin_login.php");
    }

?>
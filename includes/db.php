<?php
        //local server
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_password'] = "";
    $db['db_name'] = "tshop";
    foreach($db as $key => $value){
        define(strtoupper($key),$value);
    }

    $connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);




?>

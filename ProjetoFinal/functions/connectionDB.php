<?php
    $adress = "localhost";
    $user = "root";
    $pass = "";
    $db = "t1_beta";
    
    $pcon = new mysqli ($adress,$user,$pass,$db);
    if(mysqli_connect_errno()){
        echo "Failed to connect to Mysql Database: ". mysqli_connect_error();
    }


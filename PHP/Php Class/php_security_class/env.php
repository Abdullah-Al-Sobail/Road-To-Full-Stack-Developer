<?php
   $db_host = 'localhost';
   $db_password = '';
   $db_username = 'root';
   $db_name = 'table1';
   
    $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    if(mysqli_connect_errno()){
        echo 'Connection Failed';
    }

?>
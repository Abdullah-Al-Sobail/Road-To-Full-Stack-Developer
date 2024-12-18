<?php
    $dbHost = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "formdata";

    //concting databse
    $conn = mysqli_connect($dbHost,$dbUserName,$dbPassword,$dbName);
   
    //test connsction
    // if($conn->connect_error){
    //     die("connection faild ").$conn->connect_error;
    // }else{
    //     echo "Connected Successfully!";
    // }
?>
<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "moderna";

    $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

    print_r($conn);

?>
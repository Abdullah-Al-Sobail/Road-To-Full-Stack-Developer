<?php
    $dbHost = "localhost";
    $dbUserName = "root";
    $dbPssword = "";
    $dbName = "fromData";

    $conn = mysqli_connect($dbHost,$dbUserName,$dbPssword,$dbName);
    
    
    
    //check the database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      echo "Connected successfully";

?>
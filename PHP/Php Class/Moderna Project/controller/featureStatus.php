<?php
    include_once '../inc/env.php';
    $id = $_GET['id'];
    $query = "SELECT status FROM features WHERE id='$id'";
    $status_query = mysqli_query($conn,$query);
    $status = mysqli_fetch_assoc($status_query);
    if($status['status']==1){
        $query = "UPDATE features SET status='0' WHERE id='$id'";
        mysqli_query($conn,$query);

    }else{
        $query = "UPDATE features SET status='1' WHERE id='$id'";
        mysqli_query($conn,$query);
    }
header("Location:../dashboard/all_features.php?id=$id");

?>
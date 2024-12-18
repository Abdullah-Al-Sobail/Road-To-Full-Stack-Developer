<?php
    include './env.php';
    $id = $_GET['id'];
    $query = "DELETE FROM userdata WHERE id=$id";
    $delete = mysqli_query($conn,$query);
    header("Location:allPost.php");
?>
<?php
   session_start();
   include_once'../inc/env.php';
   $id = $_GET['id'];
   $query = "DELETE FROM banners WHERE id='$id'";
   $delete = mysqli_query($conn,$query);
   
   if($delete){
    $_SESSION['delete_successfully'] = 'Banner has been deleted successfully!';
    header('Location:../dashboard/all_banners.php');
   }
?>
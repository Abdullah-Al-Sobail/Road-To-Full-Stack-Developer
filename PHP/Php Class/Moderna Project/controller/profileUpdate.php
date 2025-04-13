<?php
// print_r($_FILES);
// exit();
session_start();
  if(isset($_POST['update_profile_btn'])){
    $profileImage = $_FILES['profile_image']['name'];
    if(empty($profileImage)){
      include "../inc/env.php";
      $name = $_POST['name'];
      $email = $_POST['email'];
      $id = $_SESSION['auth']['id'];
      $_SESSION['auth']['name'] = $name;
      $_SESSION['auth']['email'] = $email;
      
      $querry = "UPDATE users SET name='$name',email='$email'WHERE id='$id'";
      $update = mysqli_query($conn,$querry);

      header("Location:../dashboard/profile.php"); 
    }else{
      $image_name = $_FILES['profile_image']['name'];
      $image_location = $_FILES['profile_image']['tmp_name'];
      $image_arry = explode(".",$image_name);
      $image_extension = end($image_arry);

      $new_image_name = uniqid("user_").".".$image_extension;

      $image_path = "../dashboard/uploads/".$_SESSION['auth']['profile_img'];
      
      move_uploaded_file($image_location,"../dashboard/uploads/".$new_image_name);
      if(file_exists($image_path)){
        unlink($image_path);
        
      }  
      
      include "../inc/env.php";
      $name = $_POST['name'];
      $email = $_POST['email'];
      $id = $_SESSION['auth']['id'];
      $_SESSION['auth']['profile_img'] =  $new_image_name;
      
      $querry = "UPDATE users SET name='$name',email='$email',profile_img='$new_image_name' WHERE id='$id'";
      $update = mysqli_query($conn,$querry);

      header("Location:../dashboard/profile.php"); 
    }
  }

?>
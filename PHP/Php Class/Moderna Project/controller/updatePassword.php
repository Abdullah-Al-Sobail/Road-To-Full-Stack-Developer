<?php

    session_start();
    if(isset($_POST['update_btn'])){
        $current_pass_test = test_input($_POST['current_password']);
        $new_pass = test_input($_POST['new_password']);
        $confirm_pass = test_input($_POST['confirm_password']);
        $id = $_SESSION['auth']['id'];
        $current_password = $_SESSION['auth']['password'];
        $enc_current_password = sha1($current_pass_test);
        $enc_new_pass = sha1($new_pass);
    
        if(empty($current_pass_test)){
            $_SESSION['current_password_err'] = "Password is required";
            header("Location:../dashboard/profile.php");
        }elseif($current_password  !=  $enc_current_password){
            $_SESSION['current_password_err'] = "Password didn't match";
            header("Location:../dashboard/profile.php");
        }elseif(empty($new_pass)){
            $_SESSION['new_password_err'] = "Password can't be empty";
            header("Location:../dashboard/profile.php");
        }elseif($new_pass != $confirm_pass){
            $_SESSION['confirm_pass_err'] = "Password must be same as new password";
            header("Location:../dashboard/profile.php");
        }else{
           include '../inc/env.php';
           $querry = "UPDATE users SET password='$enc_new_pass' WHERE id ='$id'";
           $update = mysqli_query($conn,$querry);
           if($update){
            $_SESSION['pass_update_success'] = "Password has been updated successfully";
            header("Location:../dashboard/profile.php");
           }
        }


        
    }

    //senitize user input
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
    //LogIn User Info validation
    session_start();
    if(isset($_POST['loginButton'])){
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $enc_password = sha1($user_password);

        if(empty($user_email)){
            $_SESSION['user_email_err'] = "Email is required";
            header("Location:../login.php");
        }elseif(!filter_var($user_email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['user_email_err'] = "Invalid Email";
            header("Location:../login.php");
        }elseif(empty($user_password)){
            $_SESSION['user_password_err'] = "password is required";
            header("Location:../login.php");
        }elseif(strlen($user_password)<8){
            $_SESSION['user_password_err'] = "Password at least 8 character";
            header("Location:../login.php");
        } else{
            include '../inc/env.php';
          $query = "SELECT email FROM users WHERE email ='$user_email' ";
          $search_email = mysqli_query($conn,$query);
          
          if($search_email->num_rows > 0){
         
            //password verify
            $pass_querry = "SELECT id,name,email,password,profile_img FROM users WHERE email='$user_email' && password ='$enc_password'";
            $passwordVerify = mysqli_query($conn,$pass_querry);
            $auth = mysqli_fetch_assoc($passwordVerify);
           //print_r($auth);
            if($passwordVerify->num_rows>0){
                $_SESSION['auth'] = $auth;
                $_SESSION['isLogin'] = true;
                header("Location:../dashboard/dashboard.php");
            }else{
                $_SESSION['user_password_err'] ="password inccorect";
                header("Location:../login.php");
            }
            
            //print_r($passwordVerify);
          }else{
            $_SESSION['user_email_err'] ="Email or userName not found";
            header("Location:../login.php");
          }

        }
    }
?>
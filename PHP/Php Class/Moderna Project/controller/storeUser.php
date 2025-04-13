<?php
    session_start();
    //echo 'Success!';
    // print_r( $_POST);

    //validation for click the register

    if(isset($_POST['submit'])){
     
        //collect variable
        $name = test_input($_POST['name']);
        $contact = test_input($_POST['contact']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $confirm_password = test_input($_POST['confirm_password']);
        
        //Progile Image variable
        $profile_image = $_FILES['file'];
        $profile_image_extension_check = $_FILES['file']['name'];
        $profile_image_extension = explode(".",$profile_image_extension_check);
        $image_extension = end($profile_image_extension);
        $enc_password = sha1("$password");
        // print_r($enc_password);
        // exit();
        


        //name validation
        if(empty($name)){
            $_SESSION['name_err'] = "Please Enter a valid name";
            header('Location: ../register.php');   
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
         
            $_SESSION['name_err'] = "Only letters and white space allowed";
            header('Location: ../register.php'); 
        
        }

        //contact validation
        if(empty($contact)){
            $_SESSION['contact_err'] = "Contact field can't be empty";
            header('Location: ../register.php');  
        }elseif(strlen($contact)<11 || strlen($contact)>11){
            $_SESSION['contact_err'] = "Contact field must be 11 digit";
            header('Location: ../register.php');  
        }
        // elseif(!filter_var($contact,FILTER_VALIDATE_INT)){
        //     $_SESSION['contact_err'] = "Contact field must be Integernumber";
        //     header('Location: ../register.php');  
        // }


        //Email validation
       if(empty($email)){
        $_SESSION['email_err'] = "Email is required";
        header('Location: ../register.php'); 
       }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $_SESSION['email_err'] = "Please enter a valid email address";
            header('Location: ../register.php'); 
       }

       //password validation
       if(empty($password)){
        $_SESSION['password_err'] = "Password is required";
        header('Location: ../register.php'); 
       }elseif(strlen($password)<8){
        $_SESSION['password_err'] = "Password at least 8 character";
        header('Location: ../register.php');
       }

       //confirm password
       if(empty($confirm_password)){
        $_SESSION['confirm_password_err'] = "Confirm password is required";
        header('Location: ../register.php');
       }elseif($password !== $confirm_password){
        $_SESSION['confirm_password_err'] = "Password didn't match";
        header('Location: ../register.php');
       }

      
       //Profile Image Validation

       if(empty($profile_image['name'])){
        $_SESSION['file_err'] = "Profile Image is missing";
        header('Location: ../register.php');
       }elseif($image_extension !== 'jpg' && $image_extension !== 'jpeg' && $image_extension !== 'png'){
        $_SESSION['file_err'] = "Profile Image must be in jpg,jpeg or png format";
        header('Location: ../register.php');
       }else{
           $new_image_name = uniqid("user_").".".$image_extension;
           $target_dir = "../dashboard/uploads/".$new_image_name;
            $image_dir = $_FILES['file']['tmp_name'];
            move_uploaded_file($image_dir,$target_dir);
       
       }
       include '../inc/env.php';
       $querry = "INSERT INTO users(name, contact, email, password, profile_img) VALUES ('$name','$contact','$email','$enc_password','$new_image_name')";
       $insert = mysqli_query($conn, $querry);
       if($insert){
        $_SESSION['success_register'] = "You have registered successfully";
        header("Location:../login.php");
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
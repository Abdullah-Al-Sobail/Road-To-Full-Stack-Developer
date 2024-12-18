<?php
session_start();
include './env.php';
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        //print_r($_POST);
        if(empty($_POST['name'])){
            $_SESSION['nameErr'] = "Name is required";
            header("Location:editPost.php?id=$id");
            exit();
            
        }else{
            $name = test_user($_POST['name']);
            if(!preg_match("/^[a-zA-z-' ]*$/",$name)){
                $_SESSION['nameErr'] = "Only letter and white space are allowed";
                header("Location:editPost.php?id=$id");
                exit();
               
            }
        }
        if(empty($_POST['message'])){
            $_SESSION['messageErr'] = "Message is required";
            header("Location:editPost.php?id=$id");
            exit();
           
        }else{
            $message = test_user($_POST['message']);
            $query = "UPDATE userdata SET name='$name',message='$message' WHERE id = '$id'";
            $update = mysqli_query($conn,$query);
            header("Location:allPost.php");
            exit();
          
        }
    }
     //function for senitizing data
     function test_user($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
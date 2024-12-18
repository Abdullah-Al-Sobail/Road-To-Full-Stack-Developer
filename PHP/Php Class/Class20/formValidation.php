<?php
    session_start();
    include './env.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(empty($_POST['name'])){
            $_SESSION['nameErr'] = "Name is required";
            header("Location:index.php");
        }else{
            $name = test_user($_POST['name']);
            if(!preg_match("/^[a-zA-z-' ]*$/",$name)){
                $_SESSION['nameErr'] = "Only letter and white space are allowed";
                header("Location:index.php");
            }
        }
        if(empty($_POST['message'])){
            $_SESSION['messageErr'] = "Message is required";
            header("Location:index.php");
        }else{
            $message = test_user($_POST['message']);
            $query = "INSERT INTO userdata(name, message) VALUES ('$name','$message')";
            $insert = mysqli_query($conn,$query);
            header("Location:index.php");
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
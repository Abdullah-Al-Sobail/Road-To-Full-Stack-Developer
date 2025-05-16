<?php
   if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
        header('Location:./index.php');
    }else{
        include_once'./env.php';
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $passhash = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $query = "INSERT INTO texts(name,pass) VALUES ('$name','$passhash')";
        $insert = mysqli_query($conn,$query);
        if(password_verify($pass,$passhash)){
            header('Location:./dashboard.php');
        }else{
            echo 'Not Matched';
        }

   }
}
?>
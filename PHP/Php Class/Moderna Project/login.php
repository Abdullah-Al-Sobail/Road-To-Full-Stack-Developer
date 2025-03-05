<?php
    session_start();
    if(isset($_SESSION['isLogin'])){
        header("Location:dashboard/dashboard.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container mt-3">
   <div class="card col-md-6 mx-auto">
    <div class="card-header">
        Log In
    </div>
    <div class="card-body">
        <?php
            if(isset($_SESSION['success_register'])){?>
                <div class="alert alert-success">
          <?=$_SESSION['success_register']?>
          </div>
        <?php
        }
        ?>
        <form action="./controller/loginUser.php" method="POST">
            <input type="text" class="form-control" placeholder="Username or Email" name="email">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['user_email_err'])){
                        echo $_SESSION['user_email_err'];
                    }
                ?>
            </span>
            <input type="password" class="form-control my-2" placeholder="password" name="password">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['user_password_err'])){
                        echo $_SESSION['user_password_err'];
                    }
                ?>
            </span>
            <input type="submit" value="LogIn" class="btn btn-primary w-100" name="loginButton">
            <a href="./register.php" class="btn btn-sm btn-success w-100 my-2">Register</a>
        </form>
    </div>
   </div> 
   </div>
</body>
</html>
<?php
   //session_unset();
?>
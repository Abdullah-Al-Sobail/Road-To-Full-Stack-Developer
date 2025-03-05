<?php
    session_start();
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
    Register A User
    </div>
    <div class="card-body">
        <form action="./controller/storeUser.php" enctype="multipart/form-data" method="POST">
            <input type="text" placeholder="name" class="form-control" name="name">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['name_err'])){
                        echo $_SESSION['name_err'];
                    }
                ?>
            </span>
            <input type="text" placeholder="phone number " class="form-control my-2" name="contact">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['contact_err'])){
                        echo $_SESSION['contact_err'];
                    }
                ?>
            </span>
            <input type="text" class="form-control my-2" placeholder="Email" name="email">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['email_err'])){
                        echo $_SESSION['email_err'];
                    }
                ?>
            </span>
            <input type="password" class="form-control my-2" placeholder="password" name="password">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['password_err'])){
                        echo $_SESSION['password_err'];
                    }
                ?>
            </span>
            <input type="password" class="form-control my-2" placeholder="confirm password" name="confirm_password">
            <span class="text-danger">
                <?php
                    if(isset($_SESSION['confirm_password_err'])){
                        echo $_SESSION['confirm_password_err'];
                    }
                ?>
            </span>
            <input type="file" class="form-control my-2" name="file">
            <span class="text-danger">
            <?php
                    if(isset($_SESSION['file_err'])){
                        echo $_SESSION['file_err'];
                    }
                ?>
            </span>
            <input type="submit" value="Register" class="btn btn-primary w-100" name="submit">
            <a href="./login.php" class="btn btn-sm btn-success w-100 my-2">Back To LogIn</a>
        </form>
    </div>
   </div> 
   </div>
</body>
</html>

<?php
    session_unset();
?>
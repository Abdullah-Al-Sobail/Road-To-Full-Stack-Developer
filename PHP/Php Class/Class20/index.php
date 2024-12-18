<?php
    session_start();
    include './navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
  
</head>
<body>
    
        <!-- Navabr End Here -->
        <div class="card col-lg-6 m-auto mt-5">
            <div class="card-header">
                Submit your message
            </div>
            <div class="card-body">
                <form action="./formValidation.php" method="POST">
                    <label for="" class="form-label"><span class="text-danger">*</span>Name:</label>
                    <input type="text" class="form-control" name="name">
                    <p class="text-danger">
                        <?php
                            if(isset($_SESSION['nameErr'])){
                                echo $_SESSION['nameErr'];
                            }
                        ?>
                    </p>
                    <label for="" class="form-label"><span class="text-danger">*</span>Message:</label>
                   <textarea name="message" id="" class="form-control"></textarea>
                   <p class="text-danger">
                        <?php
                            if(isset($_SESSION['messageErr'])){
                                echo $_SESSION['messageErr'];
                            }
                        ?>
                    </p>
                   <input type="submit" class="btn btn-primary w-100 my-3" value="Post">
                </form>
            </div>
        </div>
    

    
</body>
</html>
<?php
    session_unset();
?>
<?php
    include './env.php';
    include './navbar.php';
    session_start();
    $id = $_GET['id'];
    $query = "SELECT id, name,message FROM userdata WHERE id = '$id'";
    $select = mysqli_query($conn,$query);
    $selectPost = mysqli_fetch_assoc($select);
    //$query = "UPDATE userdata SET id='$id',name='$name',message='$message' WHERE id = '$d'";
    //$update = mysqli_query($conn,$query);
    //$updatePost = mysqli_fetch_assoc($update);
    print_r($selectPost);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
   
</head>
<body>
    <!-- Navbar -->
    

        <div class="card col-lg-6 m-auto mt-5">
            <div class="card-header">
                Update your message
            </div>
            <div class="card-body">
                <form action="./updatePost.php" method="POST">
                    <input type="hidden" value="<?=$id?>" name="id">
                    <label for="" class="form-label"><span class="text-danger">*</span>Name:</label>
                    <input type="text" class="form-control" name="name" value="<?=$selectPost['name']?>">
                    <p class="text-danger">
                        <?php
                            if(isset($_SESSION['nameErr'])){
                                echo $_SESSION['nameErr'];
                            }
                        ?>
                    </p>
                    <label for="" class="form-label"><span class="text-danger">*</span>Message:</label>
                   <textarea name="message" id="" class="form-control" rows="10"><?=$selectPost['message']?></textarea>
                   <p class="text-danger">
                        <?php
                            if(isset($_SESSION['messageErr'])){
                                echo $_SESSION['messageErr'];
                            }
                        ?>
                    </p>
                   <input type="submit" class="btn btn-primary w-100 my-3" value="Update Post" name="update">
                </form>
            </div>
        </div>

</body>
</html>
<?php
    session_unset();
?>
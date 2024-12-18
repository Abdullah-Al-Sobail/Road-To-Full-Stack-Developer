<?php
include './env.php';
include './navbar.php';
    $id = $_GET['id'];
    $query = "SELECT id, name,message FROM userdata WHERE id = '$id'";
    $select = mysqli_query($conn,$query);
    $selectPost = mysqli_fetch_assoc($select);
    //for testing purpose
    //print_r($selectPost);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Single Post</title>
   
</head>
<body>
     

        <!--Single Post Template-->
        <div class="card col-lg-6 m-auto mt-4">
            <div class="card-header fw-bold d-flex justify-content-between">
                Post by : <span class="text-success"><?=$selectPost['name']?></span>
                <a class="text-white p-2 btn btn-danger btn-sm" href="./allPost.php">Back</a>
            </div>
            <div class="card-body">
                <?=$selectPost['message']?>
            </div>
        </div>

</body>
</html>
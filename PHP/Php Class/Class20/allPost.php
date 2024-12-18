<?php
    include './env.php';
    include './navbar.php';
    $query = "SELECT * FROM userdata";
    $fetch = mysqli_query($conn,$query);
    $results = mysqli_fetch_all($fetch,1);

    // echo "<pre>";
    // print_r($results);
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
   
</head>
<body>
<div class="card col-lg-6 m-auto mt-4">
        <div class="card-header">
            All Post
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th class="text-danger">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($results as $key=>$result){?>

                        <tr>
                        <td><?=++ $key?></td>
                        <td><?=$result['name']?></td>
                        <td>
                            <?php
                            if(strlen($result['message'])>40){
                                echo substr($result['message'],0,40)."...";
                            }else{
                                echo $result['message'];  
                            }
                        ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="./showPost.php?id=<?=$result['id']?>" class="btn btn-primary btn-sm">Show</a>
                                <a href="./editPost.php?id=<?=$result['id']?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="./deletePost.php?id=<?=$result['id']?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </td>
                    </tr>
                       <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</body>
</html>
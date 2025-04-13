<?php

    include_once 'inc/header.php';
    include_once '../inc/env.php';
    $id = $_GET['id'];
  $query = "SELECT * FROM banners WHERE id='$id'";
  $select = mysqli_query($conn,$query);
  $fetch = mysqli_fetch_assoc($select);



?>
 
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
 <div class="card col-md-5 mx-auto mt-5">
 
   
   
        <div class="card-header d-flex justify-content-between">
            Edit Banner 
            <a href="./all_banners.php" class="btn btn-danger btn-sm">Back</a>
        </div>
    <div class="card-body">
        <form action="../controller/editBanner.php" method="POST">
            <input type="hidden" value="<?=$id?>" name="id">

            <input type="text" class="form-control my-2" placeholder="Banner Title" name="banner_title" value="<?=$fetch['banner_title']?>">
            
            <?php
                if(isset($_SESSION['banner_title_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_title_err']?></p>
            <?php
                }
            ?>
           
            <textarea class="form-control my-2" placeholder="Banner Description" name="banner_description"><?=$fetch['banner_des']?></textarea>
            <?php
                if(isset($_SESSION['banner_description_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_description_err']?></p>
            <?php
                }
            ?>

            <input type="text" class="form-control my-2" placeholder="Button Text" name="button_text" value="<?=$fetch['button_text']?>">
            <?php
                if(isset($_SESSION['banner_button_text _err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_button_text _err']?></p>
            <?php
                }
            ?>
            <input type="text" class="form-control my-2" placeholder="Button Link" name="button_link" value="<?=$fetch['button_link']?>">
            <?php
                if(isset($_SESSION['banner_button_link_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_button_link_err']?></p>
            <?php
                }
            ?>
            <input type="submit" class="form-control my-2 btn btn-primary" value="Update" name="update_btn">
        </form>
    </div>
</div>
</main>

<?php
     unset($_SESSION['banner_title_err']);
     unset($_SESSION['banner_description_err']);
     unset($_SESSION['banner_button_text _err']);
     unset($_SESSION['banner_button_link_err']);
     unset($_SESSION['banner_update']);

?>

<?php
    include_once 'inc/header.php';

?>
 
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
 <div class="card col-md-5 mx-auto mt-5">

    <?php
        if(isset($_SESSION['banner_insert'])){?>
            <div class="alert alert-success">
            <?=$_SESSION['banner_insert']?>
            </div>
     <?php   
     }
    ?>
   
        <div class="card-header">
            Add New Banner
        </div>
    <div class="card-body">
        <form action="../controller/storeBanner.php" method="POST">
            <input type="text" class="form-control my-2" placeholder="Banner Title" name="banner_title">
            <?php
                if(isset($_SESSION['banner_title_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_title_err']?></p>
            <?php
                }
            ?>
            <textarea class="form-control my-2" placeholder="Banner Description" name="banner_description"></textarea>
            <?php
                if(isset($_SESSION['banner_description_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_description_err']?></p>
            <?php
                }
            ?>

            <input type="text" class="form-control my-2" placeholder="Button Text" name="button_text">
            <?php
                if(isset($_SESSION['banner_button_text _err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_button_text _err']?></p>
            <?php
                }
            ?>
            <input type="text" class="form-control my-2" placeholder="Button Link" name="button_link">
            <?php
                if(isset($_SESSION['banner_button_link_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['banner_button_link_err']?></p>
            <?php
                }
            ?>
            <input type="submit" class="form-control my-2 btn btn-primary" value="Submit" name="submit_btn">
        </form>
    </div>
</div>
</main>

<?php
    unset($_SESSION['banner_title_err']);
    unset($_SESSION['banner_description_err']);
    unset($_SESSION['banner_button_text _err']);
    unset($_SESSION['banner_button_link_err']);
    unset($_SESSION['banner_insert']);
?>
<?php
    include_once 'inc/header.php';

?>
 
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

 <div class="card col-md-12 mx-auto mt-5">

  
   
        <div class="card-header">
            Add Feature
        </div>
    <div class="card-body">
        <form action="../controller/storeFeature.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="feature_img" class="form-control my-2">
            <?php
                if(isset($_SESSION['feature_img_err'])){?>
                <p class="text-danger"><i class="bi bi-x text-danger"></i><?= $_SESSION['feature_img_err']?></p>
            <?php
                }
            ?>
            <input type="text" class="form-control my-2" placeholder="Feature Title" name="feature_title">
      
            <input type="text" class="form-control my-2" placeholder="description" name="feature_des">
            <label for="" class="form-label mt-2">Feature Description</label>
            <textarea class="content form-control my-2" placeholder="Feature Details" name="feature_details" ></textarea>
            <input type="submit" class="form-control my-2 btn btn-primary" value="Submit" name="submit_btn">
        </form>
    </div>
</div>
</main>

<?php
  unset($_SESSION['feature_img_err']);
?>
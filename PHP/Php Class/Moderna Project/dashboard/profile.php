<?php
  include_once 'inc/header.php';
?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?php
        if(isset($_SESSION['pass_update_success'])){?>
            <div class="alert alert-success">
                <?=$_SESSION['pass_update_success']?>
            </div>
        <?php
        }
    ?>
 
     <div class="card col-md-5 mx-auto mt-5">
        <div class="card-header">
            Users Details
        </div>
        <div class="card-body">
        
        <form action="../controller/profileUpdate.php" method="POST" enctype="multipart/form-data">
            <label for="profile">
            <img src="<?=baseUrl()."dashboard/uploads/".$_SESSION['auth']['profile_img']?>" alt="profile_image" style="height:120px; width:120px; border-radius: 50%; object-position:center; object-fit:cover; border:2px solid black; cursor:pointer;" >
            </label>
                <input type="file" class="form-control mt-3 w-100" id="profile" name="profile_image">
                <label for="name" class="form-label mt-3">
                    User Name
                </label>
                <input type="text" class="form-control " id="name" value="<?=$_SESSION['auth']['name']?>" name="name">
                <label for="email" class="form-label mt-3">
                    User email
                </label>
                <input type="text" class="form-control " id="email" value="<?=$_SESSION['auth']['email']?>" name="email">
                <button type="submit" class="btn btn-primary mt-3" name="update_profile_btn">Update Profile</button>
        </form>
        </div>
       </div>

       <!-- password section -->

       <div class="card col-md-5 mx-auto mt-3">
        <div class="card-header">Password</div>
        <div class="card-body">
            <form action="../controller/updatePassword.php" method ="POST">
                <label for="">Current Password</label>
                <input type="text" class="form-control" name="current_password">
                <p class="text-danger">
                <?php
                    if(isset($_SESSION['current_password_err'])){
                        echo  $_SESSION['current_password_err'];
                    }
                ?>

                </p>
                <label for="">New Password</label>
                <input type="text" class="form-control" name="new_password">
                
                <p class="text-danger">
                <?php
                    if(isset( $_SESSION['new_password_err'])){
                        echo   $_SESSION['new_password_err'];
                    }
                ?>

                </p>
               
                
                <label for="">Confirm Password</label>
                <input type="text" class="form-control" name="confirm_password">
                <p class="text-danger">
                <?php
                    if(isset($_SESSION['confirm_pass_err'])){
                        echo $_SESSION['confirm_pass_err'];
                    }
                ?>

                </p>
                <button class="btn btn-danger mt-2" name="update_btn">Update Password</button>
            </form>
        </div>
       </div>
     
    </main>
  </div>
</div>
<script src="./js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="./JS/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>

<?php
    unset($_SESSION['current_password_err']);
    unset($_SESSION['confirm_pass_err']);
?>

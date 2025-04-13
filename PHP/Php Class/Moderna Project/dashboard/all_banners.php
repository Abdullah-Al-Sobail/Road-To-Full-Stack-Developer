<?php
    include_once 'inc/header.php';
    include_once '../inc/env.php';

  $query = "SELECT * FROM banners";
  $select = mysqli_query($conn,$query);
  $fetch = mysqli_fetch_all($select,1);

?>
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card col-md-10 mx-auto mt-5">
    
    
    <?php
        if(isset($_SESSION['banner_update'])){?>
            <div class="alert alert-success">
            <?=$_SESSION['banner_update']?>
            </div>
     <?php   
     }
    ?>
    <?php
        if(isset($_SESSION['delete_successfully'])){?>
            <div class="alert alert-danger">
            <?=$_SESSION['delete_successfully']?>
            </div>
     <?php   
     }
    ?>
        <div class="card-header">
            All Banners
        </div>

        <div class="card-body">
        
            <table class="table">
                <thead>
                    <th>SL</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Button Text</th>
                    <th>Link</th>
                    <th>Actions</th>
                </thead>

                <tbody>
                <?php
              foreach($fetch as $key=>$banners){?>
                    <tr>
                        <td><?=++$key?></td>
                        <td><?=$banners['banner_title']?></td>
                        <td><?php
                            if(strlen($banners['banner_des'])>40){
                                echo substr($banners['banner_des'],0,40).'...';
                            }else{
                                echo $banners['banner_des'];
                            }
                        
                        
                        ?></td>
                        <td><?=$banners['button_text']?></td>
                        <td><?=$banners['button_link']?></td>
                        <td>
                            <div class="btn-group">
                                <a href="./edit_banner.php?id=<?=$banners['id']?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="../controller/deleteBanner.php?id=<?=$banners['id']?>" class="btn btn-sm btn-danger">Delete</a>
                                
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
 </main>
 <?php
    unset($_SESSION['banner_update']);
    unset($_SESSION['delete_successfully']);
 ?>
<?php
    include_once 'inc/header.php';
    include_once '../inc/env.php';

  $query = "SELECT * FROM features";
  $select = mysqli_query($conn,$query);
  $fetch = mysqli_fetch_all($select,1);

//print_r($fetch);

?>
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card col-md-12 mx-auto mt-5">
    
    
   
        <div class="card-header">
            All Features
        </div>

        <div class="card-body">
        
            <table class="table">
                <thead>
                    <th>SL</th>
                    <th>TitleFeature Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Actions</th>

                </thead>

                <tbody>
         
                <?php
                    foreach($fetch as $key=>$feature){
                        ?>
                        <tr>
                        <td><?= ++$key ?></td>
                        <td><img src="<?="./uploads/".$feature['feature_img']?>" alt="" width="100px" height="100px"></td>
                        <td><?=$feature['feature_title']?></td>
                        <td><?=$feature['feature_des']?></td>
                        <td><?=html_entity_decode($feature['feature_details'])?></td>
                        <td><?=$feature['status']==1?"<p class='badge bg-success text-white'>Active</p>":"<p class='badge bg-danger text-white'>Deactive</p>"?></td>
                        <td>
                       
                            <div class="btn-group">
                              
                                <a href="../controller/featureStatus.php?id=<?=$feature['id']?>" class="btn btn-sm <?=
                                $feature['status']==1?'btn-danger':'btn-success' ?>"><?= $feature['status']==1?'Deactivate':'Activate'?></a>
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

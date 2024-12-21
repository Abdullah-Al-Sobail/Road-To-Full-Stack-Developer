<?php
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["uploadedFile"]["name"]);
    $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $file_temp_location = $_FILES["uploadedFile"]["tmp_name"];
    $check = getimagesize($file_temp_location);
    
    //var_dump($check);
    if($check !== false){
        echo "File is an image ".$check["mime"].".";
        if(file_exists($target_file)){
            echo "Sorry! File already exists";
        }else if($_FILES["uploadedFile"]["size"]>4000){
            echo "Sorry! File is too large";
            
        }else{
            move_uploaded_file($file_temp_location,$target_file);
        }
        
    }else{
        echo "File is not an image";
    }
?>
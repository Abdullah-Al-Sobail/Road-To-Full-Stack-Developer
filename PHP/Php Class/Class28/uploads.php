<?php
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["uploadFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //Check if image is actual image file or fake image
    if(isset($_POST["submit"])){
        $check = getimagesize($_FILES["uploadFile"]["tmp_name"]);
        if($check !== false){
            echo "File is an Image - ".$check["mime"].".";
            $uploadOk = 1;
        }else{
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
    }

    //check if file already exists or not
    if(file_exists($target_file)){
        echo "Sorry, file is already exists!";
        $uploadOk = 0;
    }

    //check file size meet the requirement
    if($_FILES["uploadFile"]["size"]>400000){
        echo "Sorry, your file is too large";
        $uploadOk = 0; 
    }

    //Allow certain file formats 
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"){
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    //if every conditions meet try to upload image
    if($uploadOk == 0){
        echo "Sorry, your file was not uploded";
    }else if(move_uploaded_file($_FILES["uploadFile"]["tmp_name"],$target_file)){
        echo "The file".htmlspecialchars(basename($_FILES["uploadFile"]["name"]))." has been uploaded.";
    }else{
        echo "Sorry, there was an error uploading your file";
    }


?>
<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    echo "<br>";
    print_r($imageFileType);
    echo "<br>";
    print_r(getimagesize($target_file));
    

?>
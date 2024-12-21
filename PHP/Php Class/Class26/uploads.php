<?php
session_start();
    if(isset($_POST['Submit'])){
        if(empty($_FILES['uplodedFile']['name'])){
            $_SESSION['fileErr']= "Please Upload a File";
            header("Location: ./index.php");
        }else{
            $targetDir = "uploads/";
    

            move_uploaded_file($_FILES["uplodedFile"]["tmp_name"],$targetDir.$_FILES["uplodedFile"]["name"]);
                $_SESSION['successUpload'] ='File is Uploded Successfully';
            header("Location: ./index.php");
        }
        
    }

  
    
    //echo "<span style= 'color:green;font-weight:bold;'>Uploded Successfully</span>";
?>
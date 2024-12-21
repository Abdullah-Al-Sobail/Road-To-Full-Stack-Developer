<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php File Uploads</title>
</head>
<body>
    <form action="uploads.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="uplodedFile" id="uplodedFile">
        
        <input type="submit" value="Submit File" name="Submit">
        <span style="color:red">*
        <?php
          if(isset($_SESSION['fileErr'])){
            echo $_SESSION['fileErr'];

        }  
      
        ?>
        </span><br>
        <span style="color: green; font-weight:bold;">
            <?php
                if(isset($_SESSION['successUpload'])){
                    echo $_SESSION['successUpload'];
                }
            ?>
        </span>
    </form>
</body>
</html>
<?php
    session_unset();
?>



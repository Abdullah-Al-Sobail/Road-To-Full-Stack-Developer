<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploads</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadedFile" id="uplodedFile">
        <input type="submit" value="Uploads File" name="submit">
    </form>
</body>
</html>


<?php
    // $myFile = fopen("testText.txt","a");
    // $text = "This is a test file\n";
    // fwrite($myFile,$text);
    // $text = "This is a test1 file\n";
    // fwrite($myFile,$text);
    // fclose($myFile);

?>
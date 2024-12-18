<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <lable>Name:</lable>
        <input type="text">
        <br><br>
        <input type="submit">
    </form>
</body>
</html>
<?php
    //$text = "           This is a\ text      ";
    // echo strlen(trim($text));
    //echo stripslashes($text);
    
?>
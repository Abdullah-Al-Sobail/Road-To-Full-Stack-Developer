
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form handaling</title>
</head>
<body>
    <form action="./form_data.php" method="GET">
        Name: <input type="text" name="name"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        <input type="submit">
    </form>
</body>
</html>

<?php
    //print_r($_GET);
    // $text = "Hello world world";
    // $pattern = "/World/i";
    // echo preg_match($pattern,$text)."<br>";
    // echo preg_match_all($pattern,$text)."<br>";
    // echo preg_replace($pattern,"php",$text);
    // $txt = "you are better than \n think you";
    // $pattern = "/you/m";
    // var_dump($txt);
    // echo preg_match_all($pattern, $txt);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
</head>
<body>
    <h3>Your Form Data:</h3>
    <p>Your name is : <?php
        echo $_GET['name'];
    ?></p>
    <p>Your email is : <?php
        echo $_GET['email'];
    ?></p>
</body>
</html>
<?php
session_start();
   
?>
    
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
        <style>
            .err{
                color:red;
            }
        </style>
    </head>
    <body>
        <h2>PHP validation form</h2>
        <p class="err">*required field</p>
        <form action="formData.php" method="POST">
            <label for="">Name: </label>
            <input type="text" name="name">
            <span class="err">*
            <?php
                if(isset($_SESSION['nameErr'])){
                   echo $_SESSION['nameErr'];
                }
                ?>
            </span>
            <br><br>
            <label for="">Email:</label>
            <input type="text" name="email">
            <span class="err">*
            <?php
                if(isset($_SESSION['emailErr'])){
                   echo $_SESSION['emailErr'];
                }
                ?>
            </span>
            <br><br>
            <label for="">website:</label>
            <input type="url" name="website">
            <span class="err">*
            <?php
                if(isset($_SESSION['websiteErr'])){
                   echo $_SESSION['websiteErr'];
                }
                ?>
            </span>
            <br><br>
            <label for="">Comment</label>
            <textarea name="comment" id=""></textarea>
            <br><br>
            <label for="">Gender</label>
            <input type="radio" name="gender" value="Male">
            <label for="">Male</label>
            <input type="radio" name="gender" value="Female">
            <label for="">Female</label>
            <input type="radio" name="gender" value="Other">
            <label for="">other</label>
            <span class="err">*
            <?php
                if(isset($_SESSION['genderErr'])){
                   echo $_SESSION['genderErr'];
                }
                ?>
            </span>
            <br><br>
            <input type="submit" value="Submit" name="button">
        </form>
    </body>
    </html>
    <?php
        session_unset();
    ?>
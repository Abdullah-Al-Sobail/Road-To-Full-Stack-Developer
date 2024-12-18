<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class15_Form validation</title>
</head>
<body>
    <h2>Php Form validation</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <label for="name">Name:</label>
        <input type="text" name="userName"><span style="color: red;">
            <?php
               if(isset($_POST['submit'])){
                if(empty($_POST['userName'])){
                    echo "<p>Name filed is required</p>";
                } 
            }
            ?>
        </span><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email"><br><br>
        <label for="url">Website:</label>
        <input type="text" name="website"><br><br>
        <label for="comment">Comment:</label>
        <textarea name="text" id="desText"></textarea><br><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male">
        <label for="Male">Male</label>
        <input type="radio" name="gender" value="Female">
        <label for="Female">Female</label>
        <input type="radio" name="gender" value="Other">
        <label for="other">Other</label>
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    //print_r($_POST);
    if(empty($_POST['userName'])){
    }else{
        $name = $_POST['userName'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $text = $_POST['text'];
        $gender = $_POST['gender'];
    
        echo "<h2>Your Input is :</h2>";
        echo "Name :$name <br>Email:$email<br>Website:$website<br>Comment:$text<br>Gender:$gender";
    }
   
}

/* if($_SERVER['REQUEST_METHOD'] == 'POST'){
     //print_r($_POST);
     $name = $_POST['userName'];
     $email = $_POST['email'];
     $website = $_POST['website'];
     $text = $_POST['text'];
     $gender = $_POST['gender'];
 
     echo "<h2>Your Input is :</h2>";
     echo "Name :$name <br>Email:$email<br>Website:$website<br>Comment:$text<br>Gender:$gender";
} */
    

?>
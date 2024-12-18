<?php
    session_start();
        // echo "<pre>";
        // print_r($_SERVER);
        // echo "</pre>";
       
        //print_r($_SESSION);
                
        //form error date collection
        //$nameErr = $emailErr = $websiteErr = $genderErr = "";
    
        //from data collection variable
        include('./env.php');
        $name = $email = $website = $comment = $gender = "";
        
        //validation for button click
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //Name filed vaildity
            if(empty($_POST['name'])){
                $_SESSION['nameErr'] = "Name is Required";
                header("Location:index.php");
                
            }else{
                $name = test_user($_POST['name']);
                if(!preg_match("/^[a-zA-z-' ]*$/",$name)){
                    $_SESSION['nameErr'] =  "Only letters and white space are allowed";
                    header("Location:index.php");
                }
            }
            //Email validity
            if(empty($_POST['email'])){
                $_SESSION['emailErr'] = "Email is required";
                header("Location:index.php");
            }else{
                $email = filter_var(test_user($_POST['email']),FILTER_SANITIZE_EMAIL);
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $_SESSION['emailErr'] = 'Invalid Email Adress';
                    header("Location:index.php");
                }
            }
            //website validation
            if(empty($_POST['website'])){
                $_SESSION['websiteErr'] = "Invalid URL";
                header("Location:index.php");
            }else{
                $website = test_user($_POST['website']);
            }
            //comment handle
            if(empty($_POST['comment'])){
                $comment = "";
            }else{
                $comment = test_user($_POST['comment']);
            }
            //Gender validity
            if(empty($_POST['gender'])){
                $_SESSION['genderErr'] = "gender is required";
                header("Location:index.php");
            }else{
                $gender = test_user($_POST['gender']);
                $query = "INSERT INTO userdata(name, email, website, comment, gender) VALUES ('$name','$email','$website','$comment','$gender')";
                $insert = mysqli_query($conn,$query);
                header("Location:index.php");
            
            }
            
        }
    
        print_r($_POST);
    
        //function for data cleaning
        function test_user($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
          //Form data handling
    
        //   if(empty($name) && empty($email) && empty($website) && empty($comment) && empty($gender)){
        //     echo "<h2>No Record Submitted yet</h2>";
        //     }
        //     else{
        //         echo "<h2>Your Submitted Information : </h2>";
        //         if(isset($_SESSION['nameErr'])){
        //             echo "Name :$name<br>";
        //         };
        //         if(isset($_SESSION['emailErr'])){
        //             echo "Email : $email<br>";
        //         }
    
        
        
        
       
?>
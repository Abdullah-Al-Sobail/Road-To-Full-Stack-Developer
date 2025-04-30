<?php
    session_start();

    if(isset($_POST['submit_btn'])){
        $feature_title = test_input($_POST['feature_title']);
        $feature_des = test_input($_POST['feature_des']);
        $feature_details = test_input($_POST['feature_details']);
        $feature_img = $_FILES['feature_img'];
        $image_name_array = explode('.',$feature_img['name']);
        $image_extension = end($image_name_array);
        $new_image_name = uniqid("feature_").".".$image_extension;
        // print_r($new_image_name);
        // exit();
        if(empty($feature_img['name'])){
            $_SESSION['feature_img_err'] = "Feature Image Not Found";
            header('Location:../dashboard/add_feature.php');
        }elseif($image_extension !== 'jpg' && $image_extension !== 'jpeg' && $image_extension !== 'png'){
            $_SESSION['feature_img_err'] = "Feature Image Invaild Format";
            header('Location:../dashboard/add_feature.php');
        }elseif(empty($feature_title)){
            $_SESSION['feature_title_err'] = "Feature title is required";
            header('Location:../dashboard/add_feature.php');
        }elseif(strlen($feature_title)>100){
            $_SESSION['feature_title_err'] = "Feature title must be less than 80 character";
            header('Location:../dashboard/add_feature.php');
        }elseif(empty($feature_des)){
            $_SESSION['feature_des_err'] = "Feature description is required";
            header('Location:../dashboard/add_feature.php');
        }elseif(strlen($feature_des)>350){
            $_SESSION['feature_des_err'] = "Feature description must be less than 350 character";
            header('Location:../dashboard/add_feature.php');
        }elseif(empty($feature_details)){
            $_SESSION['feature_details_err'] = "Feature is required";
            header('Location:../dashboard/add_feature.php');
        }else{
            include_once '../inc/env.php';
            $uploads_image = move_uploaded_file($feature_img['tmp_name'],"../dashboard/uploads/".$new_image_name);
           if($uploads_image){

            $query ="INSERT INTO features(feature_img, feature_title, feature_des, feature_details) VALUES ('$new_image_name','$feature_title',' $feature_des',' $feature_details')"; 

            $insert = mysqli_query($conn,$query);
            if($insert){
                $_SESSION['insert_success'] = "New Feature Item added successfully";
                header('Location:../dashboard/add_feature.php');
            }

           }
        }
    }

    //senitize user input
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
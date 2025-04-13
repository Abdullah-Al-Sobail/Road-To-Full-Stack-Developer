<?php
    session_start();

    if(isset($_POST['submit_btn'])){
        $banner_title = test_input($_POST['banner_title']);
        $banner_description = test_input($_POST['banner_description']);
        $banner_button_text = test_input($_POST['button_text']);
        $banner_button_link = test_input($_POST['button_link']);
        
        if(empty($banner_title)){
            $_SESSION['banner_title_err'] = 'Banner title is required';
            header('Location:../dashboard/add_banner.php');
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$banner_title)){
            $_SESSION['banner_title_err'] = 'Only letters and white space are allowed';
            header('Location:../dashboard/add_banner.php');
        }elseif(strlen($banner_description) > 60){
            $_SESSION['banner_title_err'] = 'Banner description must be less60 character';
            header('Location:../dashboard/add_banner.php');
        }elseif(empty($banner_description)){
            $_SESSION['banner_description_err'] = 'Banner description are required';
            header('Location:../dashboard/add_banner.php');
        }elseif(strlen($banner_description) > 256){
            $_SESSION['banner_description_err'] = 'Banner description must be less 256 character';
            header('Location:../dashboard/add_banner.php');
        }elseif(empty($banner_button_text)){
            $_SESSION['banner_button_text _err'] = 'Button text is required';
            header('Location:../dashboard/add_banner.php');
        }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$banner_button_text)){
            $_SESSION['banner_button_text_err'] = 'Only letters and white space are allowed';
            header('Location:../dashboard/add_banner.php');
        }elseif(empty($banner_button_link)){
            $_SESSION['banner_button_link_err'] = 'Button link is required';
            header('Location:../dashboard/add_banner.php');
        }else{
            include_once '../inc/env.php';

            $query = "INSERT INTO banners(banner_title, banner_des, button_text, button_link) VALUES ('$banner_title','$banner_description','$banner_button_text','$banner_button_link')";
            $insert = mysqli_query($conn, $query);

            if($insert){
                $_SESSION['banner_insert'] = 'New Banner Added Successfully!';
                header('Location:../dashboard/add_banner.php');
            }
        }

    }


    //sanitize data
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
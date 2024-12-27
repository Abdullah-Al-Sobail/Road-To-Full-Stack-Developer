<?php
    session_start();
    //create coockie
    // $cookie_name = 'test';
    // $cookie_value = 'Jhon Doe';
    // //var_dump(time()+86400);
    // setcookie($cookie_name,$cookie_value,time()+86400*30,'/');

    // //check the cookie 
    // var_dump(count($_COOKIE));
    $_SESSION['name'] = "This is name session";
    $_SESSION['test'] = "This is test session";

   

?>
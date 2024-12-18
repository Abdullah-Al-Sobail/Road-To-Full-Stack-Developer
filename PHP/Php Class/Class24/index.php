<?php
    //echo readfile('readme.txt');
    $text = fopen('readme.txt','r');
    //echo fread($text,filesize('readme.txt'));
    // echo fgets($text);
    // fclose($text);
    while(!feof($text)){
        echo fgets($text)."<br>";
    }
?>
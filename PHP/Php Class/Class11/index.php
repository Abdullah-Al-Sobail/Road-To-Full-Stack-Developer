<?php
    
    //  $temp_files = array("temp15.txt","Temp10.txt",
    //  "temp1.txt","Temp22.txt","temp2.txt");
     
    //  natsort($temp_files);
    //  echo "Natural order: ";
    //  echo "<pre>";
    //  print_r($temp_files);
    //  echo "</pre>";
    //  echo "<br />";
    //  echo "<pre>";
    //  natcasesort($temp_files);
    //  print_r($temp_files);
    //  echo "</pre>";
    //  echo "Natural order case insensitve: ";
    //  print_r($temp_files);
    //print_r($temp_files);
    $a1 = "variable1";
    $a2 = "variable2";
    $a3 = "variable3";

    function myfun(){
       global $a4 ;
       $a4 = "variableF4";
        var_dump($GLOBALS['a2']);
    }
    //var_dump($GLOBALS);
    myfun();
    

?>
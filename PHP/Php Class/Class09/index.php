<?php
    //$cars = array("Volvo", "BMW", "Toyota");
    // $numbers = array(4, 6, 2, 22, 11);
    // //sort($cars);
    // sort($numbers);
    // //print_r($cars);
    // print_r($numbers);
    // $mainArry = ["item1","item2",
    // ["subItem1","SubItem2",[
    //     "subItem2.1","SubItem2.2",[
    //             "key1" => "value1","key2" => "value2"
    //         ]
    //     ]]
    //     ];
    //     echo "<pre>";
    // var_dump($mainArry);
    // echo "</pre>";
    // print_r($mainArry[2][2][2]['key2']);
    $student_info = [
            "Name" => "jhon",
            "Age" => "23",
            "Gender" => "Male"
    ];
    var_dump(array_change_key_case($student_info));
?>
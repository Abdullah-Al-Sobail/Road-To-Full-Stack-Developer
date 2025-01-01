<?php
// session_start();
//     // $_SESSION['test'] = "This is test session";
//     // $_SESSION['test1'] = "This is test session1";
//     // session_unset();
//     session_destroy();
//     print_r($_SESSION);
// print_r(filter_list());
// print_r(filter_id(filter_list()['6']));
$text = 100;
//echo $text;
echo "<pre>";
print_r(filter_var($text));
 echo "</pre>";
?>
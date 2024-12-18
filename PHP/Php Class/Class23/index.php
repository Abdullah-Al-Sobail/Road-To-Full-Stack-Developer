<?php
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Y-M-D:".date("Y-M-D",$d)."</br>";
echo "y-m-d:".date("y-M m-d D")."</br>";
echo "Y-m-D:".date("Y-m-D")."</br>";
echo "Y/M/D:".date("Y/M/D")."</br>";
echo "&copy; ".date("2024-12-11")."<br>";
print_r(date("y-m-d h:s:i",strtotime("10:30pm April 15 2014")));

?>
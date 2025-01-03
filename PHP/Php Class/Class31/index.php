<?php

//    $student_info = ["name"=> "jhon", "age"=> 22, "gender"=> "Male"];

//    $encoded_data = json_encode($student_info);
//    $obj = json_decode($encoded_data);

//    var_dump($obj->name);
function divide($dividend, $divisor) {
    if($divisor == 0) {
      throw new Exception("Division by zero", 1);
    }
    return $dividend / $divisor;
  }
  
  try {
    echo divide(5, 0);
  } catch(Exception $ex) {
    echo "<pre>";
    print_r($ex);
    echo "</pre>";
    $code = $ex->getCode();
    $message = $ex->getMessage();
    $file = $ex->getFile();
    $line = $ex->getLine();
    echo "Exception thrown in $file on line $line: [Code $code]
    $message";
   
  }

?>
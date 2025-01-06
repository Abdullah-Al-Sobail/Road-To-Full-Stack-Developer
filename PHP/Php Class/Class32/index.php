<?php
    // class Car{
    //     //property of Car
    //     public $name = "This is just a class";

    //     //Method
    //     public function test(){
    //         echo "This is a test function";
    //     }
    // }

    // $obj = new Car();
    // echo $obj->name;
    
    class Student_Info{
        public $name;
        public $age;
        function __construct($name, $age)
        {
            echo "I am a constructor";
        }
        //Methods
        public function info($name,$age){
            return "Our new student name is $name and age is $age";
        }
    }

    $obj = new Student_Info("Sakib",20);
    
    //var_dump($obj instanceof Student_Info);

    // echo $obj->info("sakib",20);
    // echo $obj->info("Rakib",30);


?>
<?php

class Student{
    private $name;
    private $age;
    private $cgpa;

    function setInfo($name = "" , $age = 0 , $cgpa = 0.0)
    {
        $this->name = $name;
        $this->age = $age;
        $this->cgpa = $cgpa;
    }
    function getInfo()
    {
        echo "<p>Name: $this->name</p>";
        echo "<p>Age: $this->age</p>";
        echo "<p>CGPA: $this->cgpa</p>";
    }

}

$student = new Student();
$student->setInfo("Gossum" , 56 , 4.00);
$student->getInfo();

?>

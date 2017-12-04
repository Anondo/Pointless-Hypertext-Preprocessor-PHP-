<?php

class Student{
    public $name;
    public $cgpa;
}
$student = new Student();
$student->name = "ABC";
$student->cgpa = 3.90;
echo json_encode($student);





 ?>

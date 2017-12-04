<?php

class Student{
    public $name;
    public $cgpa;
}

function getJSONStudent()
{
    $student = new Student();
    $student->name = "ABC";
    $student->cgpa = 3.90;
    return json_encode($student);
}





 ?>

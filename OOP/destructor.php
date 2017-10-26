<?php

class Employee{
    private $name;
    private $age;
    private $salary;
    //there can only be one constructor for each class in php
    function __construct($name = "" , $age = 0 , $salary = 0.0)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    function setInfo($name = "" , $age = 0 , $salary = 0.0)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    function getInfo()
    {
        echo "<p>Name: $this->name</p>";
        echo "<p>Age: $this->age</p>";
        echo "<p>Salary: $this->salary</p>";
    }
    function __destruct()
    {
        echo "Bye Bye Object";
    }

}

$employee = new Employee("Adam" , 27 , 45000);
$employee->getInfo();
$employee = new Employee("Jessica" , 30 , 66000);
$employee->getInfo();



 ?>

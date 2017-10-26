<?php

/* A class must be declared abstract to have abstract methods */
abstract class MyAbstractClass{
    abstract function sayHello();
    abstract function greeting($name);
    /* an abstract class can have normal functions as well */
    function normalFunc()
    {
        echo "<p>This is a normal function</p>";
    }
}
/* The child class of an abstract class must implement all the function inside the abstract class */
class MyClass extends MyAbstractClass{
    function sayHello()
    {
        echo "<p>Hello World</p>";
    }
    function greeting($name)
    {
        echo "<p>Hello $name</p>";
    }
}

$obj = new MyClass();
$obj->sayHello();
$obj->greeting("Alex");
$obj->normalFunc();



 ?>

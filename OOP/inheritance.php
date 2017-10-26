<?php

class PParent{
    protected $x;
    protected $y;
    function PParent()
    {
        echo "<p>This is the parent class</p>";
    }
    function setValues($x , $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    function __destruct()
    {
        echo "<p>Bye Bye Parent</p>";
    }
}
class Child extends PParent{
    private $z = 20;
    function Child() //if there was no child constructor then the parent constructor would have been called automatically 
    {
        echo "<p>This is the child class</p>";
        echo "Calling parent class constructor: ";
        PParent::PParent();
    }
    function getValues()
    {
        echo "<p>X = $this->x</p>";
        echo "<p>Y = $this->y</p>";
        echo "<p>Z = $this->z</p>";
    }
    function __destruct()
    {
        echo "<p>Bye Bye Child</p>";
    }
}

$obj = new Child();
$obj->setValues(12,44);
$obj->getValues();


?>

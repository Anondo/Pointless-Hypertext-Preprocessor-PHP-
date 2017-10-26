<?php

/* Interfaces can only contain function declarations and no definitions.
All the functions inside an interface are actually abstract so the class which
implements the Interface has to define all the functions. */
interface Area{
    public function getArea();
}
interface Identity{
    public function whatAmI();
}

class Triangle implements Area , Identity{ //multiple implementation is allowed
    private $base;
    private $height;
    function Triangle($base = 0.0 , $height = 0.0)
    {
        $this->base = $base;
        $this->height = $height;
    }
    public function getArea()
    {
        return ((0.5) * $this->base * $this->height);
    }
    public function whatAmI()
    {
        echo "<p>I am a Triangle</p>";
    }
}

$triangle = new Triangle(3 , 7);
echo "<p>Area of the triangle ". $triangle->getArea() ."</p>";
$triangle->whatAmI();

?>

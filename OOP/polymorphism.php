<?php

class Animal{
    function Animal()
    {
        echo "<p>This is the Animal Class</p>";
    }
    function sound()
    {
        echo "<p>Sounds of Animal Kingdom</p>";
    }
    function playSound()
    {
        echo $this->sound();
    }
}
class Dog extends Animal{
    function Dog()
    {
        echo "<p>This is the Dog class</p>";
    }
    function sound() //function overriding 
    {
        echo "<p>Wooof Woooof!!!</p>";
    }
}
class Cat extends Animal{
    function Cat()
    {
        echo "<p>This is the Cat class</p>";
    }
    function sound()
    {
        echo "<p>Meoooww Meeeow!!</p>";
    }
}

$animal = new Cat();
$animal->playSound();
$animal = new Dog();
$animal->playSound();


 ?>

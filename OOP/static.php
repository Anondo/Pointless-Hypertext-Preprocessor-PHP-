<?php

class MyClass{
    public static $count = 0;
    function MyClass()
    {
        self::$count++;
    }
    function getStatic()
    {
        return self::$count;
    }
    function incStat()
    {
        self::$count++;
    }
    static function getStatValue()
    {
        echo self::$count;
    }
}

echo "<p>".MyClass::$count."</p>";
$obj = new MyClass();
$obj2 = new MyClass();
echo "<p>".MyClass::$count."</p>";
//echo "<p>".$obj->$count."</p>";

echo $obj->getStatic();
$obj2->incStat();
echo "<br />";
echo $obj->getStatic();
echo "<br />";
MyClass::getStatValue();


 ?>

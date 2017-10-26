<?php

$myArr = array(1,2,3,4,5); //array initialization

//printing array using for loop
for($i = 0; $i < sizeof($myArr); $i++)
{
    echo "<p>myArr[$i] = $myArr[$i]</p>";
}
//printing array using foreach loop
foreach($myArr as $item)
{
    echo "<p>$item</p>";
}
//array appending
$myArr[] = 6;
foreach($myArr as $item)
{
    echo "<p>$item</p>";
}
//array is dynamic
$myArr[] = "Hello";
$myArr[] = 2.5;
foreach($myArr as $item)
{
    echo "<p>$item</p>";
}
//another approach of creating array
$myArr2[0] = 1;
$myArr2[1] = 1.5;
$myArr2[2] = "Hello World";
for($i = 0; $i < sizeof($myArr2); $i++)
{
    echo "<p>myArr2[$i] = $myArr2[$i]</p>";
}
//printing everything of an array...used only for debugging purpose
print_r($myArr);
echo "</br>";
print_r($myArr2);

?>

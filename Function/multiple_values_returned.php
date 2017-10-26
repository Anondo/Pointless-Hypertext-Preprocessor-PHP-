<?php

function swap($num1 , $num2)
{
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
    return array($num1 , $num2);
}
$a = 12;
$b = 23;
echo "<p>Before Swap:</p>";
echo "<p>A = $a</p>";
echo "<p>B = $b</p>";
$values = swap($a , $b);
$a = $values[0];
$b = $values[1];
echo "<p>After Swap:</p>";
echo "<p>A = $a</p>";
echo "<p>B = $b</p>";

 ?>

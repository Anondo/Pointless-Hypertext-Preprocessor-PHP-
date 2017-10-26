<?php

function swapNormal($num1 , $num2)
{
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
}
function swapRef(&$num1 , &$num2)
{
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
}
$a = 12;
$b = 23;
echo "<h3>Initial Values: A = $a   & B = $b</h3>";
swapNormal($a,$b);
echo "<p>After Normal Swap: A = $a   & B = $b</p>";
swapRef($a , $b);
echo "<p>After Reference Swap: A = $a   & B = $b</p>";


 ?>

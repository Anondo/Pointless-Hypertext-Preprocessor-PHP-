<?php

echo "<h3>foreach is a loop used for traversing the elements of an array</h3>";
$arr = array(1,2,3,4,5,6,7,8,9);
foreach($arr as $e)
{
    echo "<p>$e</p>";
}
echo "<h3>Only even numbers</h3>";
foreach($arr as $e)
{
    if($e % 2 != 0)
        continue;
    echo "<p>$e</p>";
}

 ?>

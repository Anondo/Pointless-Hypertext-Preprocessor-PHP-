<?php

//a multidimensional array is an array of arrays!!!
$table = array(array(1,2,3)  , array(4,5,6) , array(7,8,9));
echo "<h3>This is a 2D array</h3>";
for($i = 0; $i < sizeof($table); $i++)
{
    for($j = 0; $j < sizeof($table[$i]); $j++)
    {
        echo "<p>[$i][$j] = ".$table[$i][$j]."</p>";
    }
}

?>

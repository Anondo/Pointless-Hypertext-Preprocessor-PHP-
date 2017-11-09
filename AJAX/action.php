<?php

if(isset($_GET["number"]))
{
    $arg = $_GET["number"];
    if($arg % 2 == 0)
        echo "The Number is Even";
    else
        echo "The Number is Odd";
}
else
{
    echo "Something Went Wrong";
}




 ?>

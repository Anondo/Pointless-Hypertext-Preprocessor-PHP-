<?php

$var1 = 12;
$var2 = 0;
try
{
    if($var2 == 0)
        throw new Exception("No Zero Division Idiot");
    echo "$var1 divided by $var2 is: ".$var1/$var2;
}

catch(Exception $e)
{
    echo "Error!: ".$e->getMessage();
}


 ?>

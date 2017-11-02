<?php

session_start();
print_r($GLOBALS);
echo "<br />";
session_unset("name"); //removes the variable
session_unset("alter_ego"); //same
print_r($GLOBALS);
echo "<br />";
session_destroy(); //removes all the variables
print_r($GLOBALS);



 ?>

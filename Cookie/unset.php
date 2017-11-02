<?php

setcookie("name" , "" , time()-1000); //there is no unset function cookie but if the time parameter is set in the past the
//the cookie is unset
setcookie("age" , "" , time()-1000);
print_r($GLOBALS);


?>

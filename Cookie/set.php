<?php
/* Cookie does the same as the session(see session first))but the only difference is the temporary cookie folder is handled
 by the browser not the server like cookie. Cookie data is not unset if the browser is closed*/
/* setcookie(name_of_the_variable, value , expiring_time) */
setcookie("name" , "Bruce Wayne" , time() + 2000);  //the third parameter is optional,time() function returns the current time in seconds
//the 2000 is added with it for the data to stay set for 2000seconds
setcookie("age" , 35 , time() + 2000);
print_r($GLOBALS);



?>

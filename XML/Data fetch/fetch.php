<?php

$xml = simplexml_load_file("data.xml") or die("Could Not Create Object");
echo "<h1>List of User----Password:</h1>";
echo "<ol>";
    foreach($xml->user as $user)
    {
        echo "<li>$user->username----$user->password</li>";
    }
echo "</ol>";

?>

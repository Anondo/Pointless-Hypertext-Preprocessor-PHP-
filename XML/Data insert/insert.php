<?php

$username = $_POST["username"];
$password = $_POST["pass"];
if(!empty($username) && !empty($password))
{
    $xml = simplexml_load_file("data.xml") or die("Could Not Create Object");
    $newXmlEntry = $xml->addChild("user");
    $newXmlEntry->addChild("username" , $username);
    $newXmlEntry->addChild("password" , $password);
    file_put_contents("data.xml" , $xml->asXML());
    echo "<h1>Data Inserted</h1>";
}
else
{
    echo "<h1>Cannot Insert Empty Data</h1>";
}



 ?>

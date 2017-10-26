<?php

function databaseError()
{
    echo "<h5>Could not establish connection with database</h5>";
}
$server = "localhost:3306";
$user = "root";
$pass = "";
$db = "phptest";
$conn = new mysqli($server , $user , $pass , $db);
if($conn->connect_error)
{
    databaseError();
}
else
{
    echo "<h2>The Datas Received:</h2>";
    $query = "select * from emp;";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc())
    {
        echo "<p>{$row['eid']}. {$row['ename']} who gets {$row['salary']}tk salary</p>";
    }
    $conn->close();
}


?>

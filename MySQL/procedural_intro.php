<?php

function errorMessage()
{
    echo "<h5>Could not establish connection with database!</h5>";
}
$server = "localhost:3306";
$user = "root";
$password = "";
$con = mysqli_connect($server , $user , $password);
if(!$con)
{
    errorMessage();
}
else
{
    mysqli_select_db($con,"phptest");
    $query = "Select * from emp;";
    $data = mysqli_query($con , $query);
    if(!$data)
    {
        errorMessage();
    }
    else
    {
        echo "<h2>The Datas Received:</h2>";
        while($row = mysqli_fetch_assoc($data))
        {
            echo "<p>{$row['eid']}. {$row['ename']} who gets {$row['salary']}tk salary</p>";
        }
    }
    mysqli_close($con);
}



 ?>

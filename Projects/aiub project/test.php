<?php

require("Models.php");

$something = new Models();
$res = $something->executeQuery("select * from emp ;");
if(!$res)
{
    echo "fuck";
}
else
while($rows = $res->fetch_assoc())
{
    echo $rows["ename"];
}

 ?>

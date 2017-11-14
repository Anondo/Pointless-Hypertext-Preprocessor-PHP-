<?php

/*require("Models.php");

$something = new Models();
$res = $something->executeQuery("select pro_pic from users;");
while($row = $res->fetch_assoc())
{
    echo '<img src="data:image/png;base64,'.base64_encode( $row['pro_pic'] ).'"/>';
}*/
//date_default_timezone_set("Asia/Dhaka");
//echo date("d/m/Y h:i:sa");


if($_GET["enable"] == "true")
    echo "Hello World";
else
    echo "Bye Bye World";


 ?>

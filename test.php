<?php

require("Models.php");

$something = new Models();
$res = $something->executeQuery("select pro_pic from users;");
while($row = $res->fetch_assoc())
{
    echo '<img src="data:image/png;base64,'.base64_encode( $row['pro_pic'] ).'"/>';
}

 ?>

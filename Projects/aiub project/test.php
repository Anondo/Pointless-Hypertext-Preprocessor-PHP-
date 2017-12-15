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

//echo get_include_path();
/*$str = "http://localhost/Projects/aiub project/shit.txt";
$str = explode("/" , $str);
$path = [];
for($i = 3; $i<sizeof($str);$i++)
{
    $path[] = $str[$i];
}
$path = join("/" , $path);
echo $path;
unlink($_SERVER['DOCUMENT_ROOT']."/".$path);*/
/*require_once("Models/Models.php");
$model = new Models();
$result = $model->executeQuery("select * from users");
$arr = array();
while($row = $result->fetch_assoc())
{
    $arr[] = $row;
}
$jsonResult = json_encode($arr);
echo $jsonResult;*/
/*require_once("Models/Models.php");
$model = new Models();
$places = array();
$result = $model->executeQuery("select * from location where crimes > 0");
while($row = $result->fetch_assoc())
{
    $places[] = $row;
}
$json_places = json_encode($places);
echo $json_places;*/
/*$password = "abcd%1abcd";
//$hash_pass = password_hash($password, PASSWORD_DEFAULT);
//echo $hash_pass;
echo "<br />";
echo password_verify($password, "");*/
$json = "[{'something':'someone'}]";
$plain = json_decode($json , true);
print_r($plain);



 ?>

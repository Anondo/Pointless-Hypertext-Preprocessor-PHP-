<?php

require("encode.php");
$jsonStudent = getJSONStudent();
echo "The Student object in JSON format:<br />";
echo $jsonStudent;
echo "<br />";
$assoc_arr_student = json_decode($jsonStudent);
echo "The Student object in Associative array format after decoding from JSON:<br />";
foreach($assoc_arr_student as $k=>$v)
{
    echo "$k  =  $v<br />";
}



 ?>

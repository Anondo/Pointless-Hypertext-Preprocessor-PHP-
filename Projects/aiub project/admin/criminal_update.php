<?php
require_once(__DIR__."\..\Controllers\CriminalController.php");
$criminal_control = new CriminalController();
$id = $_GET["criminal_id"];
$pro_pic = $_GET["pp"];
if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["day"]) && !empty($_POST["month"]) && !empty($_POST["year"]) && !empty($_POST["email"]) && !empty($_POST["gender"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $previous_fullname = $criminal_control->getFullName($id);
    $prevImageName = explode("/" , $pro_pic);
    $prevImageName = $prevImageName[sizeof($prevImageName)-1];
    if(!empty($_FILES["pro_pic"]["name"]))
    {
        unlink("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_fullname/Profile Picture/$prevImageName");
        $img = $_FILES["pro_pic"];
        $imgname = $img["name"];
        $img_tmp = $img["tmp_name"];
        $prevImageName = $imgname;
        move_uploaded_file($img_tmp , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_fullname/Profile Picture/$imgname");
    }
    $pro_pic = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/Uploads/$fname $lname/Profile Picture/$prevImageName";
    chmod("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_fullname" , 0777);
    rename("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_fullname" , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$fname $lname");
    $ok = $criminal_control->updateCriminalInfo($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$gender,$pro_pic);
    if($ok)
        header("Location: http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/criminal.php");
    else
        echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/criminal_edit.php?criminal_id=$id'>Something Went Wrong</a>";
}
else
    echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/criminal_edit.php?criminal_id=$id'>None of the fields can be empty</a>";



 ?>

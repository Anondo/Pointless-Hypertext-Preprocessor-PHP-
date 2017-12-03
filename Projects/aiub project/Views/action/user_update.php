<?php
session_start();
require_once(get_include_path()."\Projects\aiub project\Controllers\UserController.php");
$usercontrol = new UserController();
$id = $_GET["user_id"];
$role = $_GET["role"];
$pro_pic = $_GET["pp"];
if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["day"]) && !empty($_POST["month"]) && !empty($_POST["year"]) &&
!empty($_POST["uname"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["gender"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $gender = $_POST["gender"];
    if(isset($_FILES["pro_pic"]))
    {
        $str = $pro_pic;
        $str = explode("/" , $str);
        $path = [];
        for($i = 3; $i<sizeof($str)-1;$i++)
        {
            $path[] = $str[$i];
        }
        $path = join("/" , $path);
        $img = $_FILES["pro_pic"];
        $imgname = $img["name"];
        $img_tmp = $img["tmp_name"];
        $pro_pic = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/uploads/$uname/Profile Picture/$imgname";
        move_uploaded_file($img_tmp , $_SERVER['DOCUMENT_ROOT']."/".$path."/$imgname");
    }
    $_SESSION["username"] = $uname;
    $_SESSION["pro_pic"] = $pro_pic;
    $previous_uname = $usercontrol->getUsername($id)["username"];
    rename("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname" , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$uname");
    $ok = $usercontrol->updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic);
    if($ok)
        header("Location: http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/index.php");
    else
        echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/user_info.php'>Something Went Wrong</a>";
}
else
    echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/user_info.php'>None of the fields can be empty</a>";



 ?>

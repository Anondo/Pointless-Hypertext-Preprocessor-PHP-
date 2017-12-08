<?php
require_once(get_include_path()."\Projects\aiub project\Controllers\UserController.php");
require_once(get_include_path()."\Projects\aiub project\Controllers\CriminalController.php");
$usercontrol = new UserController();
$criminal_control = new CriminalController();
$id = $_GET["user_id"];
$pro_pic = $_GET["pp"];
if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["day"]) && !empty($_POST["month"]) && !empty($_POST["year"]) &&
!empty($_POST["uname"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["gender"]) && !empty($_POST["role"]))
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
    $role = $_POST["role"];
    $previous_uname = $usercontrol->getUsername($id)["username"];
    $prevImageName = explode("/" , $pro_pic);
    $prevImageName = $prevImageName[sizeof($prevImageName)-1];
    if(!empty($_FILES["pro_pic"]["name"]))
    {
        unlink("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname/Profile Picture/$prevImageName");
        $img = $_FILES["pro_pic"];
        $imgname = $img["name"];
        $img_tmp = $img["tmp_name"];
        $prevImageName = $imgname;
        move_uploaded_file($img_tmp , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname/Profile Picture/$imgname");
    }
    $pro_pic = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/Uploads/$uname/Profile Picture/$prevImageName";
    chmod("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname" , 0777);
    rename("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname" , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$uname");
    if($role == 3)
    {
        rename("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$uname" , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$fname $lname");
        $pro_pic = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/Uploads/$fname $lname/Profile Picture/$prevImageName";
        $ok = $criminal_control->insertCriminal($fname,$lname ,$day ,$month ,$year ,$email ,$gender,$role , $pro_pic , $uname);
        $usercontrol->removeUser($id);
    }

    else
        $ok = $usercontrol->updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic);
    if($ok)
        header("Location: http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/user.php");
    else
        echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/user_edit.php?user_id=$id'>Something Went Wrong</a>";
}
else
    echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/user_edit.php?user_id=$id'>None of the fields can be empty</a>";



 ?>

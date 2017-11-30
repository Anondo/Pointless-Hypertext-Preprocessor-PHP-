<?php
require_once(get_include_path()."\Projects\aiub project\Controllers\UserController.php");
$usercontrol = new UserController();
$id = $_GET["user_id"];
$role = $_GET["role"];

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
    $ok = $usercontrol->updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role);
    if($ok)
        header("Location: http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/index.php");
    else
        echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/user_info.php'>Something Went Wrong</a>";
}
else
    echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/user_info.php'>None of the fields can be empty</a>";



 ?>

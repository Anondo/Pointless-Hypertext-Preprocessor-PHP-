<?php


require(__DIR__."\..\..\Controllers\SignupController.php");
require(__DIR__."\..\..\Controllers\UserController.php");
$signup = new SignupController();
$usercontrol = new UserController();
$message = "";
/*if(isset($_GET['js_enabled']))
{
    $jsEnabled = $_GET["js_enabled"];
}
else
    $jsEnabled = false;*/


session_start();

if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["uname"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["cpass"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $gender = $_POST["gender"];
    $imgname = NULL;
    $directory = "../../uploads/";
    $age = (int)date("Y") - $_POST["year"];
    $bdate = "{$_POST['day']}/{$_POST['month']}/{$_POST['year']}";
    if(isset($_FILES["propic"]))
    {
        $img = $_FILES["propic"];
        $imgname = $img["name"];
        $img_tmp = $img["tmp_name"];
        move_uploaded_file($img_tmp , $directory.$imgname);
    }
    $_SESSION["criminal_data"] = $_POST; //assigning the user inputs to a session
    /*if($jsEnabled == "true")
    {
        $signup->registerUser($fname , $lname , $age ,$bdate , $uname , $email , $pass , $gender , $directory.$imgname , $imgname);
        echo "<h><a href = 'http://localhost/Projects/aiub project/index.php'>You Have Succesfully Signed UP!!!</a></h>";
        session_destroy(); //there is no need for the session if signed up perfectly
    }
    else
    {*/
        if(emptyFieldValidate() && $signup->passwordValidate($pass , $cpass)  && $signup->emailValidate($email) && $signup->usernameValidate($uname) && $signup->pictureValidate($imgname))
        {
            mkdir($directory.$uname);
            mkdir($directory.$uname."/"."Profile Picture");
            $urlImage = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/Uploads/$uname/Profile Picture/$imgname";
            $signup->registerUser($fname , $lname , $age ,$bdate , $uname , $email , $pass , $gender , $urlImage , $imgname);
            echo "<h><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/index.php'>You Have Succesfully Signed UP!!!</a></h>";
            //session_destroy(); //there is no need for the session if signed up perfectly
            if(!empty($_FILES["propic"]["name"]))
            {
                $finaleImageLocation = $directory.$uname."/"."Profile Picture/";
                copy($directory.$imgname , $finaleImageLocation.$imgname);
                unlink($directory.$imgname);
            }
            $current_user_id = $usercontrol->getUserId($uname);
            $_SESSION["logged_in"] = true; //creating a bool type session variable which should indicate whether user logged in or not
            /*username and user_id is taken as well for ease of use in other pages*/
            $_SESSION["role"] = 2;
            $_SESSION["username"] = $uname;
            $_SESSION["user_id"] = $current_user_id;
            $_SESSION["pro_pic"] = $urlImage;
        }
        else
        {
            echo "<h><a href = http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20project/Views/signup.php>".$message.$signup->getErrorMessage()."</a></h>";
            if (file_exists($directory.$imgname))
                unlink($directory.$imgname);
        }

    //}


}

function emptyFieldValidate() //there can be no empty fields
{
    global $message;
    if(!empty($_POST["fname"]) && !empty($_POST["lname"])  && !empty($_POST["uname"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["cpass"]))
    {
        return true;
    }
    else
    {
        $message = "None of the fields can be empty!";
        return false;
    }
}






 ?>

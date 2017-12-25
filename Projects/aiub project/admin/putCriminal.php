<?php


require(__DIR__."\..\Controllers\CriminalController.php");
$criminal_control = new CriminalController();
$message = "";
/*if(isset($_GET['js_enabled']))
{
    $jsEnabled = $_GET["js_enabled"];
}
else
    $jsEnabled = false;*/


session_start();

if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $imgname = NULL;
    $directory = "../uploads/";
    $year = $_POST["year"];
    $day = $_POST['day'];
    $month = $_POST['month'];
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
        if(emptyFieldValidate() && $criminal_control->emailValidate($email) && $criminal_control->pictureValidate($imgname))
        {
            mkdir($directory.$fname." ".$lname);
            mkdir($directory.$fname." ".$lname."/"."Profile Picture");
            $urlImage = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/Uploads/$fname $lname/Profile Picture/$imgname";
            $criminal_control->insertCriminal($fname , $lname , $day ,$month , $year , $email, $gender ,3 ,  $urlImage);
            echo "<h><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/admin/criminal.php'>You Have Succesfully Registered Criminal!!!</a></h>";
            //session_destroy(); //there is no need for the session if signed up perfectly
            if(!empty($_FILES["propic"]["name"]))
            {
                $finaleImageLocation = $directory.$fname." ".$lname."/"."Profile Picture/";
                copy($directory.$imgname , $finaleImageLocation.$imgname);
                unlink($directory.$imgname);
            }
        }
        else
        {
            echo "<h><a href = http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub%20project/admin/criminal_add.php>".$message."</a></h>";
            if (file_exists($directory.$imgname))
                unlink($directory.$imgname);
        }

    //}


}

function emptyFieldValidate() //there can be no empty fields
{
    global $message;
    if(!empty($_POST["fname"]) && !empty($_POST["lname"])  && !empty($_POST["email"]))
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

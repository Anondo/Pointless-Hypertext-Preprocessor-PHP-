<?php

require("Models.php");

$database = new Models();
$message = "";

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
    $directory = "uploads/";
    $age = (int)date("Y") - $_POST["year"];
    $bdate = "{$_POST['day']}/{$_POST['month']}/{$_POST['year']}";
    if(isset($_FILES["propic"]))
    {
        $img = $_FILES["propic"];
        $imgname = $img["name"];
        //echo $imgname."<br />";
        $img_tmp = $img["tmp_name"];
        move_uploaded_file($img_tmp , $directory.$imgname);
    }
    $_SESSION["signup_data"] = $_POST; //assigning the user inputs to a session
    registerUser($fname , $lname , $age ,$bdate , $uname , $email , $pass , $gender , $directory.$imgname , $imgname);
    echo "<h>You Have Succesfully Signed UP!!!</h>";
    session_destroy(); //there is no need for the session if signed up perfectly


}


function registerUser($fname , $lname , $age ,$bdate, $uname , $email , $password , $gender , $imgpath , $imgname = NULL)
{
    global $database;
    if(isset($imgname)) //inserting user in the database with profile picture
    {
        $query = "insert into users(fname , lname , age , bdate , username , email , password , pro_pic , gender)
        values('$fname' , '$lname' , $age , '$bdate' , '$uname' , '$email' , '$password' , '$imgpath' , '$gender')";
    }

    else //without profile picture
    {
        $query = "insert into users(fname , lname , age , bdate , username , email , password , gender)
        values('$fname' , '$lname' , $age , '$bdate' , '$uname' , '$email' , '$password', '$gender')";
    }

    $success = $database->executeDMLQuery($query);
    if(!$success)
        die();
}




 ?>

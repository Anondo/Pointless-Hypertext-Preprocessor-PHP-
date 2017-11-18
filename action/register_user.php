<?php

require("Models/Models.php");

$database = new Models();
$message = "";
if(isset($_GET['js_enabled']))
{
    $jsEnabled = $_GET["js_enabled"];
}
else
    $jsEnabled = false;


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
    $directory = "../uploads/";
    $age = (int)date("Y") - $_POST["year"];
    $bdate = "{$_POST['day']}/{$_POST['month']}/{$_POST['year']}";
    if(isset($_FILES["propic"]))
    {
        $img = $_FILES["propic"];
        $imgname = $img["name"];
        echo $imgname == ""."<br />";
        $img_tmp = $img["tmp_name"];
        move_uploaded_file($img_tmp , $directory.$imgname);
    }
    $_SESSION["signup_data"] = $_POST; //assigning the user inputs to a session
    if($jsEnabled == "true")
    {
        echo "JS<br />";
        registerUser($fname , $lname , $age ,$bdate , $uname , $email , $pass , $gender , $directory.$imgname , $imgname);
        echo "<h>You Have Succesfully Signed UP!!!</h>";
        session_destroy(); //there is no need for the session if signed up perfectly
    }
    else
    {
        echo "PHP<br />";
        if(emptyFieldValidate() && passwordValidate($pass , $cpass)  && emailValidate($email) && usernameValidate($uname) && pictureValidate($imgname))
        {
            registerUser($fname , $lname , $age ,$bdate , $uname , $email , $pass , $gender , $directory.$imgname , $imgname);
            echo "<h>You Have Succesfully Signed UP!!!</h>";
            session_destroy(); //there is no need for the session if signed up perfectly
        }
        else
        {
            echo "<h><a href = http://localhost/Projects/aiub%20project/action/signup.php>$message</a></h>";
        }

    }


}




function passwordValidate($p , $cp)
{
    global $message;
    if(strlen($p) < 8) //password length cannot be less than 8
    {
        $message = "Password length must of at least more than 8 characters!";
        return false;
    }
    if($p != $cp)
    {
        $message = "The Passwords Did Not Match";
        return false;
    }
    $hasSpChar = false;
    $hasDigit = false;
    $sp_chars = array("%" , "_" , "!" , "$" , "@" , "#");
    $digits = array("0" , "1" , "2" , "3" , "4" , "5" , "6" , "7" , "8" , "9");
    foreach($sp_chars as $v) //at least one of the special characters from the $sp_chars array must be present
    {
        if(strpos($p , $v))
        {
            $hasSpChar = true;
            break;
        }
    }
    foreach($digits as $v) //there must be at least one digit
    {
        if(strpos($p , $v))
        {
            $hasDigit = true;
            break;
        }
    }
    if($hasDigit && $hasSpChar)
    {
        return true;
    }
    else
    {
        $message = "Atleast (% , _ , ! , $ , @ , #) one of these characters and a numeric character must be present in the password!";
        return false;
    }
}


function usernameValidate($un) //checking for existing username
{
    global $database;
    global $message;
    $user = $database->executeQuery("select * from users where username = '$un'");
    if(!is_object($user))
    {
        return true;
    }
    else
    {
        $message = "Username already taken";
        return false;
    }
}


function emailValidate($e) //checking for correct email pattern
{
    global $message;
    if(!(strpos($e , "@")) ||(substr_count($e , "@") != 1) || (strpos($e , "@") == 0 && strpos($e , "@") != strlen($e-1)))
    {
        $message = "Invalid Email Pattern!";
        return false;
    }
    elseif(substr_count(substr($e , strpos($e , "@")+1) , ".") != 1 || strrpos($e , ".") == 1)
    {
        $message = "Invalid Email Pattern!";
        return false;
    }
    else
    {
        return true;
    }
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


function pictureValidate($pic) //the picture must be of valid extension
{
    if(strlen($pic) == 0)
        return true;
    $picNameArray = explode("." , $pic);
    $extensions = array("non zero index" , "png" , "jpg" , "jpeg");
    if(array_search($picNameArray[1] , $extensions))
    {
        return true;
    }
    else
    {
        $message = "Picture Format Not Recognized";
        return false;
    }
}
function registerUser($fname , $lname , $age ,$bdate, $uname , $email , $password , $gender , $imgpath , $imgname = "")
{
    global $database;
    if($imgname != "") //inserting user in the database with profile picture
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

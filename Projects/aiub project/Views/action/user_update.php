<?php
session_start();
require_once(__DIR__."\..\..\Controllers\UserController.php");
$usercontrol = new UserController();
$id = $_GET["user_id"];
$role = $_GET["role"];
$pro_pic = $_GET["pp"];
if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["day"]) && !empty($_POST["month"]) && !empty($_POST["year"]) &&
!empty($_POST["uname"]) && !empty($_POST["email"])  && !empty($_POST["gender"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $gender = $_POST["gender"];
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
    $pro_pic = "http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/uploads/$uname/Profile Picture/$prevImageName";
    $_SESSION["username"] = $uname;
    $_SESSION["pro_pic"] = $pro_pic;
    chmod("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname" , 0777);
    rename("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$previous_uname" , "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$uname");

    if(emailValidate($email) == true && passwordValidate($pass , $cpass) == true && pictureValidate($imgname) == true)
   {

    $ok = $usercontrol->updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic);
    if($ok)
        header("Location: http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/index.php");
    else
        echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/user_info.php'>Something Went Wrong</a>";
   }

}
else
    echo "<a href='http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/user_info.php'>None of the fields can be empty</a>";

  function emailValidate($e) //checking for correct email pattern
    {
        if(!(strpos($e , "@")) ||(substr_count($e , "@") != 1) || (strpos($e , "@") == 0 && strpos($e , "@") != strlen($e-1)))
        {
            echo "<br/> Invalid Email Pattern!";
            return false;
        }
        elseif(substr_count(substr($e , strpos($e , "@")+1) , ".") != 1 || strrpos($e , ".") == 1)
        {
            echo "<br/> Invalid Email Pattern!";
            return false;
        }
        else
        {
            return true;
        }
    }

  function passwordValidate($p , $cp)
  {
      if($p == "" || $cp == "")
        return true;
    if(strlen($p) < 8) //password length cannot be less than 8
        {
            echo "<br/> Password length must of at least more than 8 characters!";
            return false;
        }
        if($p != $cp)
        {
            echo "<br/> Passwords Do not match!";
            return false;
        }
        $hasSpChar = false;
        $hasDigit = false;
        $sp_chars = array("%" , "_" , "!" , "$" , "@" , "#", "/", ".");
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
            echo " <br/> Atleast (% , _ , ! , $ , @ , #) one of these characters and a numeric character must be present in the password!";
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
            echo "Picture Format Not Recognized";
            return false;
        }
    }


 ?>

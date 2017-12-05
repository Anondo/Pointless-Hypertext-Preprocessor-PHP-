<?php

require(get_include_path()."\Projects\aiub project\Models\UserModel.php");
class SignupController{
    private $user = NULL;
    private $signupErrorMessage = "";
    function SignupController()
    {
        $this->user = new UserModel();
    }
    function setErrorMessage($message)
    {
        $this->signupErrorMessage = $message;
    }
    function getErrorMessage()
    {
        return $this->signupErrorMessage;
    }
    function usernameExists($name)
    {
        $username =  $this->user->getUserByName($name);
        if(!is_object($username))
        {
            return true;
        }
        else
        {
            $this->setErrorMessage("Username already taken");
            return false;
        }
    }
    function passwordValidate($p , $cp)
    {
        if(strlen($p) < 8) //password length cannot be less than 8
        {
            $this->setErrorMessage("Password length must of at least more than 8 characters!");
            return false;
        }
        if($p != $cp)
        {
            $this->setErrorMessage("The Passwords Did Not Match");
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
            $this->setErrorMessage("Atleast (% , _ , ! , $ , @ , #) one of these characters and a numeric character must be present in the password!");
            return false;
        }
    }


    function usernameValidate($un) //checking for existing username
    {
        $ok = $this->usernameExists($un);
        if($ok)
        {
            return true;
        }
        else
        {
            $this->setErrorMessage("Username already taken");
            return false;
        }
    }
	function emailExists($email)
	{
		$email =  $this->user->getExistingEmail($email);
        if(!is_object($email))
        {
            return true;
        }
        else
        {
            $this->setErrorMessage("Username already taken");
            return false;
        }
	}


    function emailValidate($e) //checking for correct email pattern
    {
        if(!(strpos($e , "@")) ||(substr_count($e , "@") != 1) || (strpos($e , "@") == 0 && strpos($e , "@") != strlen($e-1)))
        {
            $this->setErrorMessage("Invalid Email Pattern!");
            return false;
        }
        elseif(substr_count(substr($e , strpos($e , "@")+1) , ".") != 1 || strrpos($e , ".") == 1)
        {
            $this->setErrorMessage("Invalid Email Pattern!");
            return false;
        }
        else
        {
            return true;
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
            $this->setErrorMessage("Picture Format Not Recognized");
            return false;
        }
    }
    function registerUser($fname , $lname , $age ,$bdate, $uname , $email , $password , $gender , $imgpath , $imgname = "")
    {
        $isPP = false;
        if($imgname != "") //inserting user in the database with profile picture
            $isPP = true;

        $success = $this->user->putUser($fname , $lname , $age ,$bdate, $uname , $email , $password , $gender , $imgpath , $imgname = "" , $isPP);

        if(!$success)
            die();
    }
}




 ?>

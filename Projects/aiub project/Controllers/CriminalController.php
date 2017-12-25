<?php

require_once(__DIR__."\..\Models\CriminalModel.php");
class CriminalController{
    private $criminal = NULL;
    function CriminalController()
    {
        $this->criminal = new CriminalModel();
    }
    function insertCriminal($fname,$lname ,$day ,$month ,$year ,$email,$gender,$role , $pro_pic , $uname = "")
    {
        return $this->criminal->putCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$gender,$role , $pro_pic);
    }
    function getCriminalUsername($id)
    {
        return $this->criminal->getCriminalUsername($id);
    }
    function getFullName($id)
    {
        return $this->criminal->getFullName($id);
    }
    function getCriminal($id)
    {
        return $this->criminal->getCriminal($id);
    }
    function getAllCriminals()
    {
        return $this->criminal->getAllCriminals();
    }
    function getCriminalsBy($key,$value)
    {
        return $this->criminal->getCriminalByKeyValue($key , $value);
    }
    function updateCriminalInfo($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$gender, $pro_pic , $role=3)
    {
        return $this->criminal->updateCriminal($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email ,$gender, $pro_pic , $role=3);
    }
    function deleteCriminal($id)
    {
        return $this->criminal->removeCriminal($id);
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
    function criminalExists($name)
    {
        $criminal_name =  $this->criminal->getCriminalByName($name);
        if(!is_object($criminal_name))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}



 ?>

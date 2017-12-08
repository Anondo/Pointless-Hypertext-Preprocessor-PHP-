<?php
require_once("Models.php");
class CriminalModel extends Models{
    function CriminalModel()
    {
        Models::Models();
    }
    function putCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email ,$gender,$role , $pro_pic)
    {
        $age = date("Y") - $year;
        $bdate = $day."/".$month."/".$year;
        $success = $this->executeDMLQuery("insert into criminals(fname,lname,age,bdate,username,email,pro_pic,gender,role)
         values('$fname','$lname',$age,'$bdate','$uname','$email','$pro_pic' , '$gender',$role)");
        return $success;
    }
    function getAllCriminals()
    {
        $criminals = $this->executeQuery("select * from criminals where del = false");
        if($criminals)
            return $criminals;
        else
            return false;
    }
    function updateCriminal($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email ,$gender, $pro_pic , $role=3)
    {
        $age = date("Y") - $year;
        $success = $this->executeDMLQuery("update criminals set
        fname = '$fname', lname = '$lname' , age = $age , bdate='$day/$month/$year' , username = '$uname' ,
        email = '$email' , pro_pic = '$pro_pic' ,  gender = '$gender' , role = $role
        where criminal_id = $id");
        return $success;
    }
    function removeCriminal($id)
    {
        $flag = $this->executeDMLQuery("update criminals set del = true where criminal_id = $id");
        return $flag;
    }
    function getCriminalByName($name)
    {
        $result = $this->executeQuery("select * from criminals where username = '$name' and del = false");
        if($result)
        {
            return $result;
        }
        else
            return false;
    }
    function getFullName($id)
    {
        $result = $this->executeQuery("select fname , lname from criminals where criminal_id = $id and del = false");
        $result = $result->fetch_assoc();
        $fname = $result["fname"];
        $lname = $result["lname"];
        return $fname." ".$lname;
    }

}


 ?>

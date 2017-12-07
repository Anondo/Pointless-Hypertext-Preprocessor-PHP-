<?php
require_once("Models.php");
class CriminalModel extends Models{
    function CriminalModel()
    {
        Models::Models();
    }
    function putCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic)
    {
        $age = date("Y") - $year;
        $bdate = $day."/".$month."/".$year;
        $success = $this->executeDMLQuery("insert into criminals(fname,lname,age,bdate,username,email,password,pro_pic,gender,role)
         values('$fname','$lname',$age,'$bdate','$uname','$email','$pass','$pro_pic' , '$gender',$role)");
        return $success;
    }
    function getAllCriminals()
    {
        $criminals = $this->executeQuery("select * from criminals");
        if($criminals)
            return $criminals;
        else
            return false;
    }
    function updateCriminal($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender, $pro_pic , $role=3)
    {
        $age = date("Y") - $year;
        $success = $this->executeDMLQuery("update criminals set
        fname = '$fname', lname = '$lname' , age = $age , bdate='$day/$month/$year' , username = '$uname' ,
        email = '$email' , password = '$pass' , pro_pic = '$pro_pic' ,  gender = '$gender' , role = $role
        where criminal_id = $id");
        return $success;
    }
    function removeCriminal($id)
    {
        $flag = $this->executeDMLQuery("update criminals set del = true where criminal_id = $id");
        return $flag;
    }

}


 ?>

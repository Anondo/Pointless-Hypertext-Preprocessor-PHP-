<?php
require_once("Models.php");
class CriminalModel extends Models{
    function putCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic)
    {
        $age = date("Y") - $year;
        $bdate = $day."/".$month."/".$year;
        $success = $this->executeDMLQuery("insert into criminals(fname,lname,age,bdate,username,email,password,pro_pic,gender,role)
         values('$fname','$lname',$age,'$bdate','$uname','$email','$pass','$pro_pic' , '$gender',$role)");
        return $success;
    }

}


 ?>

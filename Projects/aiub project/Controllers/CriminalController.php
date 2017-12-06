<?php

require_once(get_include_path()."\Projects\aiub project\Models\CriminalModel.php");
class CriminalController{
    private $criminal = NULL;
    function CriminalController()
    {
        $this->criminal = new CriminalModel();
    }
    function insertCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic)
    {
        return $this->criminal->putCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic);
    }
}



 ?>

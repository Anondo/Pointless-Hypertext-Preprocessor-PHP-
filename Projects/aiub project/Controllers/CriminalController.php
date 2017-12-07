<?php

require_once(get_include_path()."\Projects\aiub project\Models\CriminalModel.php");
class CriminalController{
    private $criminal = NULL;
    function CriminalController()
    {
        $this->criminal = new CriminalModel();
    }
    function insertCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$gender,$role , $pro_pic)
    {
        return $this->criminal->putCriminal($fname,$lname ,$day ,$month ,$year ,$uname ,$email,$gender,$role , $pro_pic);
    }
    function getAllCriminals()
    {
        $this->criminal->getAllCriminals();
    }
    function updateCriminalInfo($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$gender, $pro_pic , $role=3)
    {
        return $this->criminal->updateCriminal($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email ,$gender, $pro_pic , $role=3);
    }
    function deleteCriminal($id)
    {
        $this->criminal->removeCriminal($id);
    }
}



 ?>

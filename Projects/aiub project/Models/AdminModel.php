<?php


require_once("Models.php");
class AdminModel extends Models{
		function AdminModel()
		{
			Models::Models();
		}
		function adminValidity($uname_or_email , $pass , $key)
    	{
        	$result = $this->executeQuery("select * from users where $key = '$uname_or_email' and password = '$pass' and role = 1");
        	if($result)
        	{
            	$result = $result->fetch_assoc();
            	return $result;
        	}
        	else
        	{
            	return false;
        	}
    	}
}



?>
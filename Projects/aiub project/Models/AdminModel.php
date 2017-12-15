<?php


require_once("Models.php");
class AdminModel extends Models{
		function AdminModel()
		{
			Models::Models();
		}
		function adminValidity($uname_or_email , $pass , $key)
    	{
			$flag = false;
        	$result = $this->executeQuery("select * from users where role = 1 and del = false");
        	if($result)
        	{
				while($row = $result->fetch_assoc())
	            {
	                if($row[$key] == $uname_or_email && password_verify($pass, $row["password"]))
	                {
	                    $flag = $row;
	                }
	            }
	            return $flag;
        	}
        	else
        	{
            	return false;
        	}
    	}
}



?>

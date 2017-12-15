<?php

require_once('Models.php');
class UserModel extends Models{
    private $username = "";
    private $userid = 0;
    private $fname = "";
    private $lname = "";
    private $age = 0;
    private $bdate = "";
    private $email = "";
    private $password = "";
    private $pro_pic = NULL;
    private $gender = "";
    function UserModel( $username = "" ,  $userid = 0, $fname = "", $lname = "", $age = 0, $bdate = "", $email = "", $password = "", $pro_pic = NULL, $gender = "")
    {
        Models::Models();
        $this->username = $username;
        $this->userid = $userid;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
        $this->bdate = $bdate;
        $this->email = $email;
        $this->password = $password;
        $this->pro_pic = $pro_pic;
        $this->gender = $gender;
    }
    function setUsername($username)
    {
        $this->username = $username;
    }
    function setUserId($userid)
    {
        $this->userid = $userid;
    }
    function setFname($fname)
    {
        $this->fname = $fname;
    }
    function setLname($lname)
    {
        $this->$lname = $lname;
    }
    function setAge($age)
    {
        $this->$age = $age;
    }
    function setBdate($bdate)
    {
        $this->$bdate = $bdate;
    }
    function setEmail($email)
    {
        $this->$email = $email;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }
    function setProPic($pro_pic)
    {
        $this->pro_pic = $pro_pic;
    }
    function setGender($gender)
    {
        $this->gender = $gender;
    }
    function getUsername()
    {
        return $this->username;
    }
    function getUserId()
    {
        return $this->userid;
    }
    function getFname()
    {
        return $this->fname;
    }
    function getLname()
    {
        return $this->$lname;
    }
    function getAge()
    {
        return $this->$age;
    }
    function getBdate()
    {
        return $this->$bdate;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getGender()
    {
        return $this->gender;
    }
    function validUser($uname_or_email , $pass , $key)
    {
        $flag = false;
        $result = $this->executeQuery("select * from users where del = false");
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
    function getUsernameById($id)
    {
        $result = $this->executeQuery("select username from users where user_id = $id and del = false");
        if($result)
        {
            $result = $result->fetch_assoc();
            return $result;
        }
        else
            return false;
    }
    function getUserByName($name)
    {
        $result = $this->executeQuery("select * from users where username = '$name' and del = false");
        if($result)
        {
            return $result;
        }
        else
            return false;
    }
    function getEmail($id)
    {
        $result = $this->executeQuery("select email from users where user_id = $id");
        $result = $result->fetch_assoc();
        $email = $result["email"];
        return $email;
    }
    function getUsersByKeyValue($key , $value)
    {
        if($key == "aabove")
            $result = $this->executeQuery("select * from users where age >= $value");
        else if($key == "abelow")
            $result = $this->executeQuery("select * from users where age <= $value");
        else if($key == "role")
            $result = $this->executeQuery("select * from users where role in (select role_id from user_role where role_name LIKE '%$value%')");
        else
            $result = $this->executeQuery("select * from users where $key LIKE '%$value%'");
        $plain_users = array();
        if($result)
        {
            while($row = $result->fetch_assoc())
                $plain_users[] = $row;
            $json_users = json_encode($plain_users);
            return $json_users;
        }
        else
            return false;

    }
    function putUser($fname , $lname , $age ,$bdate, $uname , $email , $password , $gender , $imgpath , $imgname = "" , $pro_pic)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $done = NULL;
        if($pro_pic)
            $done = $this->executeDMLQuery("insert into users(fname , lname , age , bdate , username , email , password , pro_pic , gender , role)
            values('$fname' , '$lname' , $age , '$bdate' , '$uname' , '$email' , '$password' , '$imgpath' , '$gender' , 2)");
        else
            $done = $this->executeDMLQuery( "insert into users(fname , lname , age , bdate , username , email , password , gender , role)
            values('$fname' , '$lname' , $age , '$bdate' , '$uname' , '$email' , '$password', '$gender' , 2)");
        return $done;
    }

	function getAllUsers()
	{
		$result = $this->executeQuery("select * from users where del = false");
        if($result->num_rows > 0)
			return $result;
		else
			return false;
	}
    function getAllUsersExcept($id)
    {
        $result = $this->executeQuery("select * from users where del = false and user_id != $id");
        if($result->num_rows > 0)
            return $result;
        else
            return false;
    }
    function getUser($id)
    {
        $result = $this->executeQuery("select * from users where user_id = $id and del = false");
        if($result)
        {
            $result = $result->fetch_assoc();
            return $result;
        }
        return false;
    }
    function getUserIdByName($username)
    {
        $id = $this->executeQuery("select user_id from users where username = '$username'");
        $id = $id->fetch_assoc()["user_id"];
        return $id;
    }
    function getRoleName($role)
    {
        $role_name = $this->executeQuery("select role_name from user_role where role_id = $role");
        $role_name = $role_name->fetch_assoc();
        $role_name = $role_name["role_name"];
        return $role_name;
    }
    function updateUser($id , $fname,$lname ,$day ,$month ,$year ,$uname ,$email,$pass ,$gender,$role , $pro_pic)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $age = date("Y") - $year;
        $success = $this->executeDMLQuery("update users set
        fname = '$fname', lname = '$lname' , age = $age , bdate='$day/$month/$year' , username = '$uname' ,
        email = '$email' , password = '$pass' , pro_pic = '$pro_pic' ,  gender = '$gender' , role = $role
        where user_id = $id");
        return $success;

    }
    function deleteUser($id)
    {
        $flag = $this->executeDMLQuery("update users set del = true where user_id = $id");
        return $flag;
    }
    function removeUser($id)
    {
        $flag = $this->executeDMLQuery("delete from users where user_id = $id");
        return $flag;
    }
	function getExistingEmail($email)
	{
		$result = $this->executeQuery("select email from users where email = '$email' and del = false");
        if($result)
        {
            return $result;
        }
        else
            return false;
	}
    function getPP($id)
    {
        $url = $this->executeQuery("select pro_pic from users where user_id = $id");
        $url = $url->fetch_assoc();
        $url = $url["pro_pic"];
        return $url;
    }

}


 ?>

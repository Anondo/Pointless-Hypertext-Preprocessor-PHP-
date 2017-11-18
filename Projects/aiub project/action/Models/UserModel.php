<?php

require('Models.php');
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
        $this->$lname = $lname;
        $this->$age = $age;
        $this->$bdate = $bdate;
        $this->$email = $email;
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
    function getEmail()
    {
        return $this->$email;
    }
    function getPassword()
    {
        return $this->password;
    }
    function getProPic()
    {
        return $this->pro_pic;
    }
    function getGender()
    {
        return $this->gender;
    }
    function validUser($uname_or_email , $pass , $key)
    {
        $result = $this->executeQuery("select * from users where $key = '$uname_or_email' and password = '$pass'");
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
    function getUsernameById($id)
    {
        $result = $this->executeQuery("select username from users where user_id = $id");
        if($result)
        {
            $result = $result->fetch_assoc();
            return $result;
        }
        else
            return false;
    }

}


 ?>

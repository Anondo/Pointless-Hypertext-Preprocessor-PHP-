<?php

require_once("Models.php");
class BlogModel extends Models{
    function BlogModel()
    {
        Models::Models();
    }
    function allBlogs()
    {
        $result = $this->executeQuery("select * from blogs where del = false;");
        if($result->num_rows > 0)
            return $result;
        else
            return false;
    }
    function getBloggerName($id)
    {
        $name = $this->executeQuery("select username from users where user_id in (select blogger_id from blogs where blogger_id = $id);");
        if($name->num_rows > 0)
        {
            $name = $name->fetch_assoc();
            $name = $name["username"];
            return $name;
        }
        else
            return false;

    }
    function getBloggerPP($id)
    {
        $url = $this->executeQuery("select pro_pic from users where user_id in (select blogger_id from blogs where blogger_id = $id);");
        if($url->num_rows > 0)
        {
            $url = $url->fetch_assoc();
            $url = $url["pro_pic"];
            return $url;
        }
        else
            return false;
    }
    function getBlogTitle($id)
    {
        $title = $this->executeQuery("select title from blogs where blog_id = $id and del = false;");
        if($title->num_rows > 0)
        {
            $title = $title->fetch_assoc();
            $title = $title["title"];
            return $title;
        }
        else
            return false;
    }
    function getBlog($id)
    {
        $blog = $this->executeQuery("select * from blogs where blog_id = $id and del = false");
        if($blog->num_rows > 0)
        {
            $blog = $blog->fetch_assoc();
            return $blog;
        }
        else
            return false;
    }
    function getId($id)
    {
        $bid = $this->executeQuery("select blogger_id from blogs where blog_id = $id and del = false");
        if($bid->num_rows > 0)
        {
            $bid = $bid->fetch_assoc();
            $bid = $bid["blogger_id"];
            return $bid;
        }
        else
            return false;
    }

	function blogByKeyValue($key , $value)
	{
        if($key == "username")
            $result = $this->executeQuery("select * from blogs where blogger_id in(select user_id from users where username LIKE '%$value%')");
        else
		      $result = $this->executeQuery("Select * from blogs where $key LIKE '%$value%'");
		$blogs = array();
		if($result)
		{
			while($row = $result->fetch_assoc())
			{
				$blogs[] = $row;
			}
			$jsonBlogs = json_encode($blogs);
			return $jsonBlogs;
		}
		return false;
	}

    function putBlog($title , $body , $datetime , $attachment , $user_id , $name_hidden , $location , $category , $noattch)
    {
        if($noattch)
            $query = "insert into blogs(title , body , datetime ,  blogger_id , name_hidden , location , category)
            values('$title' , '$body' , '$datetime' , $user_id , $name_hidden , '$location' , '$category');";
        else
            $query = "insert into blogs(title , body , datetime , attachment , blogger_id , name_hidden , location , category)
            values('$title' , '$body' , '$datetime' , '$attachment' , $user_id , $name_hidden , '$location' , '$category');";
        $success = $this->executeDMLQuery($query);
         return $success;
    }
    function removeBlog($id)
    {
        $ok = $this->executeDMLQuery("update blogs set del = true where blog_id = $id");
        return $ok;
    }
}



 ?>

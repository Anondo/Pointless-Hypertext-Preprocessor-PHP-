<?php

require_once("Models.php");
class BlogModel extends Models{
    function BlogModel()
    {
        Models::Models();
    }
    function allBlogs()
    {
        $result = $this->executeQuery("select * from blogs;");
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
    function getBlogTitle($id)
    {
        $title = $this->executeQuery("select title from blogs where blog_id = $id;");
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
        $blog = $this->executeQuery("select * from blogs where blog_id = $id");
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
        $bid = $this->executeQuery("select blogger_id from blogs where blog_id = $id");
        if($bid->num_rows > 0)
        {
            $bid = $bid->fetch_assoc();
            $bid = $bid["blogger_id"];
            return $bid;
        }
        else
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
}



 ?>

<?php

require(get_include_path()."\Projects\aiub project\Models\BlogModel.php");
class BlogController{
    private $blog;
    function BlogController()
    {
        $this->blog = new BlogModel();
    }
    function getAllBlogs()
    {
        return $this->blog->allBlogs();
    }
    function bloggerName($id)
    {
        return $this->blog->getBloggerName($id);
    }
    function getBlogTitle($id)
    {
        return $this->blog->getBlogTitle($id);
    }
    function getBlog($id)
    {
        return $this->blog->getBlog($id);
    }
    function getBloggerId($id)
    {
        return $this->blog->getId($id);
    }
    function insertBlog($title , $body , $datetime , $attachment , $user_id , $name_hidden , $location , $category , $noattch)
    {
        return $this->blog->putBlog($title , $body , $datetime , $attachment , $user_id , $name_hidden , $location , $category , $noattch);
    }
    function removeBlog($id)
    {
        return $this->blog->removeBlog($id);
    }
}



 ?>

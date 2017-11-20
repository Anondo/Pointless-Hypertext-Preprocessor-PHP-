<?php

require("E:\PHP\Projects\aiub project\Models\BlogModel.php");
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
}



 ?>

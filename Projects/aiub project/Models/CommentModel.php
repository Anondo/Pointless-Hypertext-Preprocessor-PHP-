<?php

require_once("Models.php");
class CommentModel extends Models{
     private $comment_id = 0;
     private $blog_id = 0;
     private $user_id = 0;
     private $body = "";
     private $datetime = "";
     function CommentModel( $comment_id = 0, $blog_id = 0, $user_id = 0, $body = "", $datetime = "")
     {
         Models::Models();
        $this->comment_id = $comment_id;
        $this->blog_id = $blog_id;
        $this->user_id = $user_id;
        $this->body = $body;
        $this->datetime = $datetime;
     }
     function setCommentId($comment_id)
     {
         $this->comment_id = $comment_id;
     }
     function setBlogId($id)
     {
         $this->blog_id = $blog_id;
     }
     function setUserId($user_id)
     {
         $this->user_id = $user_id;
     }
     function setBody($body)
     {
         $this->body = $body;
     }
     function setDateTime($datetime)
     {
         $this->datetime = $datetime;
     }
     function getCommentId()
     {
         return $this->comment_id;
     }
     function getBlogId()
     {
         return $this->blog_id;
     }
     function getUserId()
     {
         return $this->user_id;
     }
     function getBody()
     {
         return $this->body;
     }
     function getDateTime()
     {
         return $this->datetime;
     }
     function getCommentsByBlog($id)
     {
        $result = $this->executeQuery("select * from comments where blog_id = $id and del = false");
        if($result)
        {
            return $result;
        }
        else
            return false;
     }
     function getUserIdByComment($id)
     {
         $result = $this->executeQuery("select user_id from comments where comment_id = $id");
         if($result)
         {
             $result = $result->fetch_assoc();
             return $result;
         }
         else
            return false;
     }
     function removeComment($id)
     {
         $ok = $this->executeDMLQuery("Update comments set del = true where comment_id = $id");
         return $ok;
     }
     function insertComment($blog_id , $user_id , $body , $datetime)
     {
         $ok = $this->executeDMLQuery("insert into comments(blog_id , user_id , body , datetime) values($blog_id , $user_id , '$body' , '$datetime')");
         return $ok;
     }
}



 ?>

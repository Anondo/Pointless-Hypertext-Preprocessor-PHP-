<?php

require("E:\PHP\Projects\aiub project\action\Models\CommentModel.php");
class CommentController{
    private $comment = NULL;
    function CommentController()
    {
        $this->comment = new CommentModel();
    }
    function getCommentByBlog($id)
    {
        return $this->comment->getCommentsByBlog($id);
    }
    function getUserIdByComment($id)
    {
        return $this->comment->getUserIdByComment($id);
    }
    function deleteComment($id)
    {
        return $this->comment->removeComment($id);
    }
    function putComment($bid , $uid , $bdy , $dtm)
    {
        return $this->comment->insertComment($bid , $uid , $bdy , $dtm);
    }
}



 ?>

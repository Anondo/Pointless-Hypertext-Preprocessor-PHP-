<?php

require("E:\PHP\Projects\aiub project\action\Controllers\CommentController.php");
$comment = new CommentController();
if(isset($_GET["comment_id"]) /*&& isset($_GET["blog_id"])*/)
{
    $ok = $comment->deleteComment($_GET['comment_id']);
    if($ok)
        echo "ok";
        //header("Location: http://localhost/Projects/aiub project/action/blog.php/?blog_id={$_GET['blog_id']}");
    else
        echo "Something Went Wrong";
}



 ?>

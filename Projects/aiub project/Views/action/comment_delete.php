<?php

require(__DIR__."\..\..\Controllers\CommentController.php");
$comment = new CommentController();
if(isset($_GET["comment_id"]) /*&& isset($_GET["blog_id"])*/)
{
    $ok = $comment->deleteComment($_GET['comment_id']);
    if($ok)
        echo "ok";
        //header("Location: htt\//Projects/aiub project/action/blog.php/?blog_id={$_GET['blog_id']}");
    else
        echo "Something Went Wrong";
}



 ?>

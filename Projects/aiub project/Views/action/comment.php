<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\CommentController.php");
$comment = new CommentController();
if(!empty($_POST['commentBody']))
{
    $db = new Models();
    $user_id = $_GET["user_id"];
    $blog_id = $_GET["blog_id"];
    date_default_timezone_set("Asia/Dhaka");
    $datetime = date("d/m/Y h:i:sa");
    $body = $_POST["commentBody"];
    $ok = $comment->putComment($blog_id , $user_id , $body , $datetime);
    if($ok)
    {
        header("Location: http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/Views/blog.php/?blog_id=$blog_id");
    }
    else
    {
        die("Something Went Wrong");
    }
}
else
{
    echo "Write Something Dude";
}


?>

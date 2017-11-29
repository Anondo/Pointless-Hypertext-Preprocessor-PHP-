<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\UserController.php");
$usercontrol = new UserController();
if(isset($_GET["user_id"]) /*&& isset($_GET["blog_id"])*/)
{
    $ok = $usercontrol->deleteUser($_GET['user_id']);
    if($ok)
        echo "ok";
        //header("Location: htt\//Projects/aiub project/action/blog.php/?blog_id={$_GET['blog_id']}");
    else
        echo "Something Went Wrong";
}



 ?>

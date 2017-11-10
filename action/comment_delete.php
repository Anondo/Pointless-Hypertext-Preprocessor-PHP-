<?php

require("Models.php");
$db = new Models();
if(isset($_GET["comment_id"]) && isset($_GET["blog_id"]))
{
    $ok = $db->executeDMLQuery("delete from comments where comment_id = {$_GET['comment_id']}");
    if($ok)
        header("Location: http://localhost/Projects/aiub project/action/blog.php/?blog_id={$_GET['blog_id']}");
    else
        echo "Something Went Wrong";
}



 ?>

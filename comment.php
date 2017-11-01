<?php

require("Models.php");
if(!empty($_POST['commentBody']))
{
    $db = new Models();
    $user_id = $_GET["user_id"];
    $blog_id = $_GET["blog_id"];
    date_default_timezone_set("Asia/Dhaka");
    $datetime = date("d/m/Y h:i:sa");
    $body = $_POST["commentBody"];
    $ok = $db->executeDMLQuery("insert into comments(blog_id , user_id , body , datetime) values($blog_id , $user_id , '$body' , '$datetime')");
    if($ok)
    {
        header("Location: http://localhost/Projects/aiub project/blog.php/?blog_id=$blog_id");
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

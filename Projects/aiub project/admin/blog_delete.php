<?php

require_once(get_include_path()."\Projects\aiub project\Controllers\BlogController.php");

$blogcontrol = new BlogController();
$id = 0;
if(!empty($_GET["blog_id"]))
    $id = $_GET["blog_id"];

$success = $blogcontrol->removeBlog($id);
if($success)
    echo "<a href = 'http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/blog.php'>Successfully Deleted</a>";
else
    echo "<a href = 'http://localhost:'".$_SERVER["SERVER_PORT"]."/Projects/aiub project/admin/blog.php?blog_id-$id'>Something Went Wrong</a>";



 ?>

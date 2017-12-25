<?php

require_once(__DIR__."\..\..\Controllers\BlogController.php");

$blogcontrol = new BlogController();
$id = 0;
if(!empty($_GET["blog_id"]))
    $id = $_GET["blog_id"];

$blog = $blogcontrol->getBlog($id);
$date = explode(" " , $blog["datetime"]);
$date = explode("/" , $date[0]);
$d = $date[0];
$m = $date[1];
$Y = $date[2];
$dir = "{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/".$blogcontrol->bloggerName($blog["blogger_id"])."/{$blog['title']}($d $m $Y)";
if($blog["attachment"])
    rmdir_recursive($dir);
$success = $blogcontrol->removeBlog($id);
if($success)
    echo "<a href = 'http://localhost:".$_SERVER["SERVER_PORT"]."/Projects/aiub project/index.php'>Successfully Deleted</a>";
else
    echo "<a href = 'http://localhost:'".$_SERVER["SERVER_PORT"]."/Projects/aiub project/Views/blog.php?blog_id-$id'>Something Went Wrong</a>";

function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}


 ?>

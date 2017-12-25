<?php

require_once(__DIR__."\..\Controllers\CriminalController.php");
$criminalcontrol = new CriminalController();
if(isset($_GET["criminal_id"]) /*&& isset($_GET["blog_id"])*/)
{
    $fullname = $criminalcontrol->getFullName($_GET["criminal_id"]);
    chmod("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$fullname" , 0777);
    rmdir_recursive("{$_SERVER['DOCUMENT_ROOT']}/Projects/aiub project/uploads/$fullname");
    $ok = $criminalcontrol->deleteCriminal($_GET['criminal_id']);
    if($ok)
        echo "ok";
        //header("Location: htt\//Projects/aiub project/action/blog.php/?blog_id={$_GET['blog_id']}");
    else
        echo "Something Went Wrong";
}
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}


 ?>

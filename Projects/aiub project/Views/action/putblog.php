<?php

require("E:\PHP\Projects\aiub project\Controllers\BlogController.php");
require("E:\PHP\Projects\aiub project\Controllers\login_controller.php");
$login = new Login();
$blog = new BlogController();

if(!empty($_POST["title"]) && !empty($_POST["location"]) && !empty($_POST["category"]) && !empty($_POST["body"]))
{
    $title = $_POST["title"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $body = $_POST["body"];
    $name_hidden = 0;
    $directory = "../../uploads/";
    $attachment = NULL;
    $noattch = true;
    date_default_timezone_set("Asia/Dhaka");
    $datetime = date("d/m/Y h:i:sa");
    if(isset($_POST["hideme"]))
        $name_hidden = true;
    if($_FILES["attchmnt"]["name"] != "")
    {
        $file = $_FILES["attchmnt"];
        $filename = $file["name"];
        $file_tmp = $file["tmp_name"];
        $attachment = $directory.$filename;
        $noattch = false;
        move_uploaded_file($file_tmp , $attachment);
    }
    $success = $blog->insertBlog($title , $body , $datetime , $attachment , $login->getUserid() , $name_hidden , $location , $category , $noattch);
    if($success)
         header("Location: http://localhost/Projects/aiub project/index.php");
    else
        echo "<a href = 'http://localhost/Projects/aiub project/Views/crime_post.php'>Something Went Wrong</a>";

}



 ?>

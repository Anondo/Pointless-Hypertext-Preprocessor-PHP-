<?php
require_once(get_include_path()."Projects\aiub project\Controllers\BlogController.php");
require(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
require(get_include_path()."\Projects\aiub project\Controllers\UserController.php");
require(get_include_path()."\Projects\aiub project\Controllers\CommentController.php");
$admincontrol = new AdminController();
$user = new UserController();
$comment = new CommentController();
$logged = $admincontrol->isLogged();

$blogid = 0;
if(isset($_GET["blog_id"]))
    $blogid = $_GET["blog_id"];
$blogcontrol = new BlogController();
$blog = $blogcontrol->getBlog($blogid);
$title= $blog["title"];
$body = $blog["body"];
$datetime = $blog["datetime"];
$full_location = $blog["location"];
$location = explode(" " , $full_location)[0];
$category = $blog["category"];
$name_hidden = $blog["name_hidden"];

 ?>
 <html>
 <head>
     <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/comment_handler.js"></script>
     <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/blog_handler.js"></script>
     <title>
         <?php

             /*The following line determines the title bar which should be the title of the blog */
             echo $blogcontrol->getBlogTitle($blogid);

          ?>
     </title>
 </head>


 <body>
 <div>
     <noscript><h4 style = "color:red;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>

     <article>
          <div id = "blog-container">
             <?php

             if(isset($_GET["blog_id"]))
             {
                 $blog = $blogcontrol->getBlog($blogid);
                 $blogger = "Anonymous"; //the blogger name is initially anonymous for safety
                 if(!$name_hidden) //if the user chooses to show his/her name
                 {
                     $blogger_id = $blog["blogger_id"];
                     $blogger = $blogcontrol->bloggerName($blogger_id);
                 }
                 echo "<div id=\"blog-container-contents\">";
                 echo "<p class ='blog_title'>".$title."</p>"."<form method='POST' action='http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/admin/blog_delete.php?blog_id=$blogid' onsubmit='return blogDeletePrompt()'><button>X</button></form>";
                 echo "<p class = \"datetime\">".$datetime."</p>";
                 echo "<p class = \"body\">".$body."</p>";
                 echo "<p class =\"bold-blog-content\">Location: ".$location."</p>";
                 echo "<p class =\"bold-blog-content\">Category: ".$category."</p>";
                 //echo $blog["attachment"]; //need to fix this
                 echo "<p class =\"bold-blog-content\">By-----".$blogger."</p>";
                 echo "</div>";
                 echo "<hr>";
                 echo "<p id = \"comment-title\">Comments</p>";
                 $commentResult = $comment->getCommentByBlog($blogid);
                 if($commentResult)
                 {

                     while($row = $commentResult->fetch_assoc())
                     {
                         $username = $user->getUsername($row['user_id']);
                         $username = $username["username"];
                         echo "<div class=\"comments\" id = {$row['comment_id']}>";

                         if($logged)
                             echo "<p><b>$username:</b>  {$row['body']}</p><p class =\"datetime\">{$row["datetime"]}</p><button onclick = 'rmvComment({$row['comment_id']})'>X</button>";
                         else
                             echo "<p><b>$username :</b>  {$row['body']}</p><p>{$row["datetime"]}</p>";
                         echo "</div>";
                     }
                 }
             }
             else
             {
                 echo "Do Not Mess Up The URL";
             }

          ?>
      </div>
     </article>

 </div>
 </body>
 </html>

<html>
<head>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/comment_handler.js"></script>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/blog_handler.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/index_style.css">
    <title>
        <?php

            require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
            require(get_include_path()."\Projects\aiub project\Controllers\UserController.php");
            require(get_include_path()."\Projects\aiub project\Controllers\CommentController.php");
            $login = new Login();
            $user = new UserController();
            $comment = new CommentController();
            $logged = $login->isLogged();
            $userId = $login->getUserid();
            $currentUsername = $login->getUsername();
            /*The following lines determine the title bar which should be the title of the blog */
            require_once(get_include_path()."\Projects\aiub project\Controllers\BlogController.php");
            $blogControl = new BlogController();
            if(isset($_GET["blog_id"]))
            {
                $id = $_GET["blog_id"];
                echo $blogControl->getBlogTitle($id);
            }
            else
            {
                echo "Blog";
            }

         ?>
    </title>
</head>


<body>
<div>
    <navigation>
        <ul>
            <?php
            if($logged)
                echo "<li class = 'right-li'><a href = 'http://localhost:".$_SERVER['SERVER_PORT']."/Projects/aiub project/Views/user_info.php'>Profile</a></li>";
            else
                echo "<li class = 'right-li'><a href = 'http://localhost:".$_SERVER['SERVER_PORT']."/Projects/aiub project/Views/signup.php'>Signup</a></li>";
            ?>
            <li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/Views/crime_post.php'>Post Crime</a></li>
            <li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/index.php'>Home</a></li>
        </ul>
    </navigation>
    <noscript><h4 style = "color:red;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>

    <article>
         <div id = "blog-container">
            <?php

            if(isset($_GET["blog_id"]))
            {
                $id = $_GET["blog_id"];
                $blog = $blogControl->getBlog($id);
                $blogger = "Anonymous"; //the blogger name is initially anonymous for safety
                if(!$blog["name_hidden"]) //if the user chooses to show his/her name
                {
                    $blogger_id = $blog["blogger_id"];
                    $blogger = $blogControl->bloggerName($blogger_id);
                }
                echo "<div id=\"blog-container-contents\">";
                echo "<p class ='blog_title'>".$blog["title"]."</p>".checkRemovalbeBlog($blog["blog_id"] , $userId);
                echo "<p class = \"datetime\">".$blog["datetime"]."</p>";
                echo "<p class = \"body\">".$blog["body"]."</p>";
                echo "<p class =\"bold-blog-content\">Location: ".$blog["location"]."</p>";
                echo "<p class =\"bold-blog-content\">Category: ".$blog["category"]."</p>";
                //echo $blog["attachment"]; //need to fix this
                echo "<p class =\"bold-blog-content\">By-----".$blogger."</p>";
                echo "</div>";
                echo "<hr>";
                echo "<p id = \"comment-title\">Comments</p>";
                $commentResult = $comment->getCommentByBlog($id);
                if($commentResult)
                {

                    while($row = $commentResult->fetch_assoc())
                    {
                        $username = $user->getUsername($row['user_id']);
                        $username = $username["username"];
                        echo "<div class=\"comments\" id = {$row['comment_id']}>";

                        if($logged)
                            echo "<p><b>$username:</b>  {$row['body']}</p><p class =\"datetime\">{$row["datetime"]}</p>".checkRemovableComment($row['comment_id'] , $id , $userId);
                        else
                            echo "<p><b>$username :</b>  {$row['body']}</p><p>{$row["datetime"]}</p>";
                        echo "</div>";
                    }
                }
                if($logged) //the privilage for the user to comment on the post if logged in
                {
                    echo "<hr>";
                    echo "<div id =\"div-commentBox\">";
                    echo "<form action = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/Views/action/comment.php/?blog_id=$id&user_id=$userId' method = 'POST' onsubmit = 'return isCommentEmpty()'>
                         <label>$currentUsername: </label>
                         <textarea id = 'commentBox' rows = '7' cols = '165' name = 'commentBody' placeholder = 'Comment Here' style='resize:none;' onkeyup = 'isCommentEmpty()'></textarea>
                          <br><input type = 'submit' id = 'comment-button' name = 'commentSubmit' value = 'comment'/>
                         <span id = \"comment_error\" style = \"color:red;font-size:16px\"></span></form>";
                    echo "</div>";
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
<?php

function checkRemovableComment($cmntid , $blogid , $uid)
{
    global $blogControl;
    global $comment;
    $result = $comment->getUserIdByComment($cmntid);
    $currentUserId = $result['user_id'];
    $bloggerId = $blogControl->getBloggerId($blogid);
    if($uid == $currentUserId || $uid == $bloggerId)
    {
        $html = "<button onclick = 'rmvComment($cmntid)'>X</button>";
        return $html;
    }
    return "";
}
function checkRemovalbeBlog($blogid , $userid)
{
    global $blogControl;
    $bloggerid = $blogControl->getBloggerId($blogid);
    if($userid == $bloggerid)
    {
        $html = "<form method='POST' action='http://localhost:{$_SERVER['SERVER_PORT']}/Projects/aiub project/Views/action/blog_delete.php?blog_id=$blogid' onsubmit='return blogDeletePrompt()'><button>X</button></form>";
        return $html;
    }
    return "";
}



 ?>

<html>
<head>
    <script src = "http://localhost/Projects/aiub%20project/js/comment_handler.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/Projects/aiub%20project/css/blog_style.css">
    <title>
        <?php

            require("E:\PHP\Projects\aiub project\Controllers\login_controller.php");
            require("E:\PHP\Projects\aiub project\Controllers\UserController.php");
            require("E:\PHP\Projects\aiub project\Controllers\CommentController.php");
            $login = new Login();
            $user = new UserController();
            $comment = new CommentController();
            $logged = $login->isLogged();
            $userId = $login->getUserid();
            $currentUsername = $login->getUsername();
            /*The following lines determine the title bar which should be the title of the blog */
            require_once("E:\PHP\Projects\aiub project\Controllers\BlogController.php");
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
    <noscript><h4 style = "color:red;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>
    <p><a href = 'http://localhost/Projects/aiub project/Views/signup.php'>Signup</a></p>
    <p><a href = 'http://localhost/Projects/aiub project/Views/crime_post.php'>Post Crime</a></p>
    <p><a href = 'http://localhost/Projects/aiub project/index.php'>Home</a></p>
    <table>
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
                echo "<tr>";
                echo "<td>";
                echo $blog["title"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo $blog["datetime"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo $blog["body"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo "Location: ".$blog["location"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo "Category: ".$blog["category"];
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                //echo $blog["attachment"]; //need to fix this
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo "By-----".$blogger;
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo "<h2>Comments</h2>";
                echo "</td>";
                echo "</tr>";
                $commentResult = $comment->getCommentByBlog($id);
                if($commentResult)
                {

                    while($row = $commentResult->fetch_assoc())
                    {
                        $username = $user->getUsername($row['user_id']);
                        $username = $username["username"];
                        echo "<tr id = {$row['comment_id']}>";
                        echo "<td>";
                        if($logged)
                            echo "$username:  {$row['body']}----------------------{$row["datetime"]}".checkRemovable($row['comment_id'] , $id , $userId)."<hr />";
                        else
                            echo "$username:  {$row['body']}----------------------{$row["datetime"]}<hr />";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                if($logged) //the privilage for the user to comment on the post if logged in
                {
                    echo "<tr>";
                    echo "<td>";
                    echo "<hr />";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<form action = 'http://localhost/Projects/aiub project/Views/action/comment.php/?blog_id=$id&user_id=$userId' method = 'POST' onsubmit = 'return isCommentEmpty()'>
                        $currentUsername:<textarea id = 'commentBox' rows = '7' cols = '165' name = 'commentBody' placeholder = 'Comment Here' style='resize:none;'></textarea>
                        <input type = 'submit' name = 'commentSubmit' value = 'comment'/>
                    </form>";
                    echo "</td>";
                    echo "</tr>";
                }

            }
            else
            {
                echo "Do Not Mess Up The URL";
            }

         ?>
    </table>
</body>
</html>
<?php

function checkRemovable($cmntid , $blogid , $uid)
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



 ?>

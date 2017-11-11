<html>
<head>
    <script src = "http://localhost/Projects/aiub%20project/js/remove_comment.js"></script>
    <link rel="stylesheet" type="text/css" href="http://localhost/Projects/aiub%20project/css/blog_style.css">
    <title>
        <?php
            session_start();
            $logged = false;
            if(isset($_SESSION["logged_in"])) //this is checked for the user to comment
            {
                $logged = $_SESSION["logged_in"];
                $userId = $_SESSION["user_id"];
                $currentUsername = $_SESSION["username"];
            }
            /*The following lines determine the title bar which should be the title of the blog */
            require("Models.php");
            $db = new Models();
            if(isset($_GET["blog_id"]))
            {
                $id = $_GET["blog_id"];
                $result = $db->executeQuery("select title from blogs where blog_id = $id");
                $result = $result->fetch_assoc();
                echo $result["title"];
            }
            else
            {
                echo "Blog";
            }

         ?>
    </title>
</head>


<body>
    <table>
        <?php

            if(isset($_GET["blog_id"]))
            {
                $id = $_GET["blog_id"];
                $result = $db->executeQuery("select * from blogs where blog_id = $id");
                $blog = $result->fetch_assoc();
                $blogger = "Anonymous"; //the blogger name is initially anonymous for safety
                if(!$blog["name_hidden"]) //if the user chooses to show his/her name
                {
                    $blogger_id = $blog["blogger_id"];
                    $idresult = $db->executeQuery("select username from users where user_id in (select blogger_id from blogs where blogger_id = $blogger_id);");
                    $blogger_name_row = $idresult->fetch_assoc();
                    $blogger = $blogger_name_row["username"];
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
                echo $blog["attachment"]; //need to fix this
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
                $commentResult = $db->executeQuery("select * from comments where blog_id = $id");
                if($commentResult)
                {

                    while($row = $commentResult->fetch_assoc())
                    {
                        $username = $db->executeQuery("select username from users where user_id = {$row['user_id']}");
                        $username = $username->fetch_assoc();
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
                    echo "<form action = 'http://localhost/Projects/aiub project/action/comment.php/?blog_id=$id&user_id=$userId' method = 'POST'>
                        $currentUsername:<textarea rows = '7' cols = '165' name = 'commentBody' placeholder = 'Comment Here' style='resize:none;'></textarea>
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
    global $db;
    $result = $db->executeQuery("select user_id from comments where comment_id = $cmntid");
    $result = $result->fetch_assoc();
    $currentUserId = $result['user_id'];
    $result = $db->executeQuery("select blogger_id from blogs where blog_id = $blogid");
    $result = $result->fetch_assoc();
    $bloggerId = $result['blogger_id'];
    if($uid == $currentUserId || $uid == $bloggerId)
    {
        $html = "<button onclick = 'rmvComment($cmntid)'>X</button>";
        return $html;
    }
    return "";
}



 ?>

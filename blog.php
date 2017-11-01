<html>
<head>
    <title>
        <?php
            session_start();
            $logged = false;
            if(isset($_SESSION["logged_in"]))
            {
                $logged = $_SESSION["logged_in"];
                $userId = $_SESSION["user_id"];
                $currentUsername = $_SESSION["username"];
            }
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
                $blogger = "Anonymous";
                if(!$blog["name_hidden"])
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
                echo $blog["attachment"];
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
                        echo "<tr>";
                        echo "<td>";
                        echo "$username:  {$row['body']}---{$row["datetime"]}<hr />";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                if($logged)
                {
                    echo "<tr>";
                    echo "<td>";
                    echo "<hr />";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<form action = 'http://localhost/Projects/aiub project/comment.php/?blog_id=$id&user_id=$userId' method = 'POST'>
                        $currentUsername:<textarea name = 'commentBody' placeholder = 'Comment Here'></textarea>
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

<html>
<head>
    <title>Is That Crime!</title>
</head>


<body>
    <?php

    session_start();
    $logged = false;
    $username = NULL;
    if(isset($_SESSION["logged_in"]))
    {
        $logged = $_SESSION["logged_in"];
        $username = $_SESSION["username"];
    }
    if($logged)
    {
        echo "<h1>Welcome $username</h1>";
        echo "<p><a href = 'logout.php'>Logout</a></p>";
    }
    else
    {
        echo "<h1>Hello World</h1>";
        echo "<p><a href = 'login.php'>Login</a></p>";
    }
    //session_destroy();
    ?>


    <table>
        <?php

            require("Models.php");
            $database = new Models();
            if($result = $database->executeQuery("select * from blogs;"))
            {
                while($row = $result->fetch_assoc())
                {
                    $blogger = "Anonymous";
                    $body = $row["body"];
                    if(strlen($body) > 50)
                    {
                        $body = substr($body , 0 , 51);
                        $body = $body."..........";
                    }
                    if(!$row["name_hidden"])
                    {
                        $blogger_id = $row["blogger_id"];
                        $idresult = $database->executeQuery("select username from users where user_id in (select blogger_id from blogs where blogger_id = $blogger_id);");
                        $blogger_name_row = $idresult->fetch_assoc();
                        $blogger = $blogger_name_row["username"];
                    }

                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>"."<a href = 'blog.php/?blog_id=".$row['blog_id']."'>".$row['title']."</a></h5>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>{$row['datetime']}</h5>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>$body</h5>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>By- $blogger</h5>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>{$row['attachment']}</h5>";
                    echo "<hr />";
                    echo "</td>";
                    echo "</tr>";
                }

            }
            else
            {
                echo "<h1>No Crime Blogs To See</h1>";
            }


         ?>
    </table>








</body>


</html>

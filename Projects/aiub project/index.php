<html>
<head>
    <title>Is That Crime!</title>
</head>


<body>
    <?php

    require("Controllers/login_controller.php");
    $login = new Login();
    if($login->isLogged())
    {
        echo "<h1>Welcome ". $login->getUsername(). "</h1>";
        echo "<p><a href = 'Views/action/logout.php'>Logout</a></p>";
    }
    else
    {
        echo "<h1>Hello World</h1>";
        echo "<p><a href = 'Views/login.php'>Login</a></p>";
    }
    echo "<p><a href = 'Views/signup.php'>Signup</a></p>";
    echo "<p><a href = 'Views/crime_post.php'>Post Crime</a></p>";
    ?>


    <table>
        <?php

            require_once("Controllers/BlogController.php");
            $blog = new BlogController();
            if($result = $blog->getAllBlogs()) //if there are blogs
            {
                while($row = $result->fetch_assoc())
                {
                    $blogger = "Anonymous"; //blogger name initially anonymous for protection
                    $body = $row["body"];
                    if(strlen($body) > 50) //not showing the entire content in the index page
                    {
                        $body = substr($body , 0 , 51);
                        $body = $body."..........";
                    }
                    if(!$row["name_hidden"]) //if the user wants to share his/her name
                    {
                        $blogger_id = $row["blogger_id"];
                        $blogger = $blog->bloggerName($blogger_id);
                    }

                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>"."<a href = 'Views/blog.php/?blog_id=".$row['blog_id']."'>".$row['title']."</a></h5>";
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
                    echo "Location: ".$row["location"];
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "Category: ".$row["category"];
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<h5>By- $blogger</h5>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
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

<html>
<head>
    <title>Is That Crime!</title>
    <link rel="stylesheet" type="text/css" href="css/index_style.css">
    <link rel="stylesheet" type="text/css" href="css/navigation.css">
</head>


<body>
    <div>

    <!--============================
            Navigation Bar
        ============================ -->
    <navigation>
        <ul>
            <?php

            require("Controllers/login_controller.php");
            $login = new Login();
            if($login->isLogged())
            {
                echo "<li><img id='pro_pic' src='{$_SESSION['pro_pic']}'/><b class = \"navigationb\">Welcome ". $login->getUsername(). "</b></li>";
                echo "<li class = \"right-li\"><a href = 'Views/action/logout.php'>Logout</a></li>";
            }
            else
            {
                echo "<li><b class = \"navigationb\">Hello World</b></li>";
                echo "<li class = \"right-li\"><a href = 'Views/login.php'>Login</a></li>";
            }
            if($login->isLogged())
                echo "<li class = \"right-li\"><a href = 'Views/user_info.php'>Profile</a></li>";
            else
                echo "<li class = \"right-li\"><a href = 'Views/signup.php'>Signup</a></li>";
                echo "<li class = \"right-li\"><a href = 'Views/crime_post.php'>Post Crime</a></li>";
                echo " <li class = \"right-li\"><a href = 'http://localhost:".$_SERVER['SERVER_PORT']."/Projects/aiub project/index.php'>Home</a></li>";
            ?>
        </ul>
    </navigation>
<!--================================
            BLOGs
====================================-->

<article>
     <div id = "all_blogs">

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
                        echo "<div id = \"single_blog\">";
                        echo "<div id =\"single_blog_content\">";
                            echo "<h5>"."<a class = \"blog_title\" href = 'Views/blog.php/?blog_id=".$row['blog_id']."'>".$row['title']."</a></h5>";
                            echo "<p class = \"datetime\">{$row['datetime']}</p>";
                            echo "<p class = \"body\">$body</p><br>";
                            echo "<p class=\"bold-blog-content\">Location - ".$row["location"]. "</p>";
                            echo "<p class=\"bold-blog-content\">Category - ".$row["category"]. "</p>";
                            echo "<p class=\"bold-blog-content\">By - $blogger</p>";
                            echo "<hr/>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                else
                {
                    echo "<div id = \"single_blog\">";
                    echo "<div id =\"single_blog_content\">";
                        echo "<h1>No Crime Blogs To See</h1>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>

        <div id = "right-content">
            <input type="text" name="serach" id = "searchbox" placeholder="search">
            <select name="by" id = "searchby">
                    <option value = "by"> By </option>
                    <option value = "category"> Category </option>
                    <option value = "location"> Location </option>
                    <option value = "user"> User </option>
                    <option value = "title"> title </option>
            </select>
        </div>
</article>

</div>
</body>
</html>

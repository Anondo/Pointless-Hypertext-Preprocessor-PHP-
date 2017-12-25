<html>
<head>
    <title>Blog Information</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_blog_style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = 'http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/blog_filter.js'></script>

    <?php
    require_once(__DIR__."\..\Controllers\AdminController.php");
    require_once(__DIR__."\..\Controllers\BlogController.php");

    $admincontrol = new AdminController();
    $blogcontrol = new BlogController();
    if(!$admincontrol->isLogged())
    {
        header("Location: login.php?logreq=1");
    }

    ?>
</head>
<body>
<div>
    <navigation>
        <ul>
            <?php

                if($admincontrol->isLogged())
                {
                    echo "<li><b class = \"navigationb\">Welcome ". $admincontrol->getUsername(). "</b></li>";
                    echo "<li class=\"right-li\"><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/Views/action/logout.php'>Logout</a></li>";
                }
                else
                {
                    echo "<li><b class = \"navigationb\">Hello World</b></li>";
                    echo "<li class=\"right-li\"><a href = 'login.php'>Login</a></li>";
                }
            ?>

        <div id = "right-content">
            <input type="text" name="serach" id = "searchbox" placeholder="search by">
            <select name="by" id = "searchby">
                    <option value = "location"> Location </option>
                    <option value = "category"> Category </option>
                    <option value = "username"> User </option>
                    <option value = "title"> title </option>
            </select>
        </div>
            <li class="dropdown right-li">
                <a href="#" class="dropbtn">Manage</a>
                <div class="dropdown-content">
                    <a href = "blog.php" > Manage Blogs </a>
                    <a href = "user.php" > Manage Users </a>
                    <a href = "criminal.php" > Manage Criminals </a>
                </div>
            </li>

            <?php
			 	echo "<li class = \"right-li\"><a href = 'http://localhost:{$_SERVER["SERVER_PORT"]}/Projects/aiub project/index.php'>Home</a></li>";
			?>
        </ul>
    </navigation>
     <article>
         <div>

   <?php
    $blogs = $blogcontrol->getAllBlogs();
    echo "<table border = '2'>";
    echo "<tr>
            <th>Datetime</th>
            <th>Title</th>
            <th>Blogger</th>
            <th>Location</th>
            <th>Category</th>
            <th>Operation</th>
         </tr>";
    if($blogs)
    {
        while($blog = $blogs->fetch_assoc())
        {
            $blogger = $blogcontrol->bloggerName($blog['blogger_id']);
            echo "<tr id='{$blog['blog_id']}' class='blogs'>
                    <td>{$blog['datetime']}</td>
                    <td>{$blog['title']}</td>
                    <td id='td-blogger'>$blogger</td>
                    <td>{$blog['location']}</td>
                    <td>{$blog['category']}</td>
                    <td id='operation'><a href = 'blog_edit.php?blog_id={$blog['blog_id']}'><button id='edit-button'>EDIT</button></a></td>
                 </tr>";
        }
    }

    echo "</table>";
   ?>
   </div>
</article>

</div>
</body>
</html>

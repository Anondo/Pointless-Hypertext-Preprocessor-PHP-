<html>
<head>
    <title>Blog Information</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_blog_style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">

    <?php
    require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
    require_once(get_include_path()."\Projects\aiub project\Controllers\BlogController.php");

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
            <li class="dropdown right-li">
                <a href="#" class="dropbtn">Manage</a>
                <div class="dropdown-content">
                    <a href = "blog.php" > Manage Blogs </a>
                    <a href = "user.php" > Manage Users </a>
                    <a href = "criminal.php" > Manage Criminals </a>
                </div>
            </li>
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
    while($blog = $blogs->fetch_assoc())
    {
        $blogger = $blogcontrol->bloggerName($blog['blogger_id']);
        echo "<tr id='{$blog['blog_id']}'>
                <td>{$blog['datetime']}</td>
                <td>{$blog['title']}</td>
                <td id='td-blogger'>$blogger</td>
                <td>{$blog['location']}</td>
                <td>{$blog['category']}</td>
                <td id='operation'><a href = 'blog_edit.php?blog_id={$blog['blog_id']}'><button id='edit-button'>EDIT</button></a></td>
             </tr>";
    }
    echo "</table>";
   ?>
   </div>
</article>   

</div>    
</body>
</html>

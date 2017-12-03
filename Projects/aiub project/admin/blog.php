<html>
<head>
    <title>Blog Information</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_blog_style.css">
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
</body>
</html>

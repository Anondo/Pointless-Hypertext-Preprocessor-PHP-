<html>

<head>
    <title>Blog Information</title>
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
                <td>$blogger</td>
                <td>{$blog['location']}</td>
                <td>{$blog['category']}</td>
                <td><a href = 'blog_edit.php?blog_id={$blog['blog_id']}'><button>EDIT</button></a></td>
             </tr>";

	}
	echo "</table>";


   ?>
</body>

</html>

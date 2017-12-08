<html>

<head>
    <title>User Information</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_user_style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">

    <script src = "http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/user_handler.js"></script>
    <script src = 'http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/default_pp_setter.js'></script>
    <?php
    require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
    $admincontrol = new AdminController();
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
        $users = $admincontrol->getAllUsersExcept($_SESSION["user_id"]);
        echo "<table border = '2'>";
        echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Profile Picture</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Operation</th>
         </tr>";
	while($user = $users->fetch_assoc())
	{
        echo "<tr id='{$user['user_id']}'>
                <td>{$user['fname']}</td>
                <td>{$user['lname']}</td>
                <td>{$user['age']}</td>
                <td>{$user['bdate']}</td>
                <td id='td-username'>{$user['username']}</td>
                <td id='td-email'>{$user['email']}</td>
                <td id='td-password'>{$user['password']}</td>
                <td id='td-pictures'><img class='circled_pro_pic' style='width:30px;height:30px;' src='{$user['pro_pic']}' onerror='return setDefaultPP(this)'/></td>
                <td>{$user['gender']}</td>
                <td>{$admincontrol->getRoleName($user['role'])}</td>
                <td id='operation'><a href = 'user_edit.php?user_id={$user['user_id']}'><button id='edit-button'>EDIT</button></a><button id='delete-button' onclick='rmvUser({$user['user_id']})'>DELETE</button></td>
             </tr>";

	}
	echo "</table>";


   ?>
</div>
</article>
</div>
</body>
</html>

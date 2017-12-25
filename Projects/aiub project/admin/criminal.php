<html>

<head>
    <title>Criminal Information</title>

    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_criminal_style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">

    <script src = "http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/criminal_handler.js"></script>
    <script src = 'http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/default_pp_setter.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = 'http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/criminal_filter.js'></script>

    <?php
    require_once(__DIR__."\..\Controllers\AdminController.php");
    require_once(__DIR__."\..\Controllers\CriminalController.php");
    $admincontrol = new AdminController();
    $criminalcontrol = new CriminalController();
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
                <option value = "username"> Username </option>
                <option value = "fname"> First Name </option>
                <option value = "lname"> Last Name </option>
                <option value = "gender"> Gender </option>
                <option value = "abelow"> Age(below) </option>
                <option value = "aabove"> Age(above) </option>
                <option value = "email"> Email </option>
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
    <div id=div-add-link align="center" for="add-link">
        <a id="add-link" href="criminal_add.php">Add a Criminal</a>
    </div>
<div>
   <?php
    $criminals = $criminalcontrol->getAllCriminals();
    echo "<table border = '2'>";
    echo "<tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Birthdate</th>
            <th>Username</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th>Gender</th>
            <th>Operation</th>
         </tr>";
    if($criminals)
    {
        while($criminal = $criminals->fetch_assoc())
    	{
            echo "<tr id='{$criminal['criminal_id']}' class='criminals'>
                    <td>{$criminal['fname']}</td>
                    <td>{$criminal['lname']}</td>
                    <td>{$criminal['age']}</td>
                    <td>{$criminal['bdate']}</td>
                    <td id='td-username'>{$criminal['username']}</td>
                    <td id='td-email'>{$criminal['email']}</td>
                    <td id='td-pictures'><img class='circled_pro_pic' style='width:30px;height:30px;' src='{$criminal['pro_pic']}' onerror='return setDefaultPP(this)'/></td>
                    <td>{$criminal['gender']}</td>
                    <td id='operation'><a href = 'criminal_edit.php?criminal_id={$criminal['criminal_id']}'><button id='edit-button'>EDIT</button></a><button id='delete-button' onclick='rmvCriminal({$criminal['criminal_id']})'>DELETE</button></td>
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

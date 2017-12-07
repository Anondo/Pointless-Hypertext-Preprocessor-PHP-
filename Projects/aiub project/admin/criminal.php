<html>

<head>
    <title>Criminal Information</title>
    <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_user_style.css">
    <script src = "http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/criminal_handler.js"></script>
    <script src = 'http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/Projects/aiub project/js/default_pp_setter.js'></script>
    <?php
    require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
    require_once(get_include_path()."\Projects\aiub project\Controllers\CriminalController.php");
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
        <a href="criminal_add.php">Add a Criminal</a>
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
            <th>Role</th>
            <th>Operation</th>
         </tr>";
    if($criminals)
    {
        while($criminal = $criminals->fetch_assoc())
    	{
            echo "<tr id='{$criminal['criminal_id']}'>
                    <td>{$criminal['fname']}</td>
                    <td>{$criminal['lname']}</td>
                    <td>{$criminal['age']}</td>
                    <td>{$criminal['bdate']}</td>
                    <td id='td-username'>{$criminal['username']}</td>
                    <td id='td-email'>{$criminal['email']}</td>
                    <td id='td-pictures'><img style='width:100%;height:100%;' src='{$criminal['pro_pic']}' onerror='return setDefaultPP(this)'/></td>
                    <td>{$criminal['gender']}</td>
                    <td>{$usercontrol->getRoleName($criminal['role'])}</td>
                    <td id='operation'><a href = 'criminal_edit.php?criminal_id={$criminal['criminal_id']}'><button id='edit-button'>EDIT</button></a><button id='delete-button' onclick='rmvCriminal({$criminal['criminal_id']})'>DELETE</button></td>
                 </tr>";

    	}
    }

	echo "</table>";


   ?>
</div>
</body>

</html>

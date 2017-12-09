<?php

require_once(get_include_path()."Projects\aiub project\Controllers\CriminalController.php");
$id = 0;
if(isset($_GET["criminal_id"]))
    $id = $_GET["criminal_id"];
    $criminal_control = new CriminalController();
    $criminal = $criminal_control->getCriminal($id);
    $fname = $criminal["fname"];
    $lname = $criminal["lname"];
    $age = $criminal["age"];
    $bdate = $criminal["bdate"];
    $bdate = explode("/" , $bdate);
    $day = $bdate[0];
    $month = $bdate[1];
    $year = $bdate[2];
    $criminalname  = $criminal["fname"]." ".$criminal["lname"];
    $email = $criminal["email"];
    $pro_pic = $criminal["pro_pic"];
    $gender = $criminal["gender"];
?>
<html>
<head>
    <title><?php echo $criminalname ?> |Criminal Information</title>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/admin_criminal_handler.js"></script>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/default_pp_setter.js"></script>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/profile_picture_previewer.js"></script>

    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/admin_navigation.css"/>
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/user_info.css"/>
</head>
<body>
<div>
    <navigation>
        <ul>
            <?php

                require_once(get_include_path()."\Projects\aiub project\Controllers\AdminController.php");
                $admin_login = new AdminController();
                if($admin_login->isLogged())
                {
                    echo "<li><b class = \"navigationb\">Welcome ". $admin_login->getUsername(). "</b></li>";
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
     <noscript><h4 style = "color:red; text-align: center;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>

    <div id = "profile_Form">

    <form name = "criminal_update_form" action="criminal_update.php?criminal_id=<?php echo $id ?>&pp=<?php echo $pro_pic ?>" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">

            <div id="image-upload-section">
                <label id="img-label">Current Profile Picture</label>
                <br><img id = "profile_pic" name="pro_pic" src="<?php echo $pro_pic ?>" onerror="return setDefaultPP(this)"/>
                <br><label id ="imginput-button" for="imginput">Upload New Picture</label>
                <br><input id= "imginput" type="file" name="pro_pic"  onchange="preview(this)"/>
            </div>

            <div id="data-section">

            	<br><label>First Name :</label>
                <br><input type="text" name="fname" class="input" placeholder="First Name..." value="<?php echo $fname;?>"/>

                <br><label>Last Name :</label>
                <br><input type="text" name="lname" class="input" placeholder="Last Name..." value="<?php echo $lname;?>"/>


                <br><label>Birthdate :</label>
                <br><span>Day :<select name="day" >
                                            <?php
                                            for($i = 1; $i<=31 ; $i++)
                                            {
                                                if($i == $day)
                                                    echo "<option value=$i selected='selected'>$i</option>";
                                                else
                                                    echo "<option value=$i>$i</option>";
                                            }
                                            ?>
                                           </select>


                	                    Month
                	   	                   <select name="month">
                                               <?php
                                                $months = array("jan" => "January","feb"=>"February","mar"=>"March","apr"=>"April","may"=>"May"
                                                ,"jun"=>"June","jul"=>"July","aug"=>"August","sep"=>"September","oct"=>"October","nov"=>"November",
                                                "dec"=>"December");
                                                foreach($months as $k=>$v)
                                                {
                                                    if($k == $month)
                                                        echo "<option value = $k selected='selected'>$v</option>";
                                                    else
                                                        echo "<option value = $k>$v</option>";
                                                }
                                                ?>

                	   	                   </select>


                	                    Year :
                	   	               	   <select name="year">
                                               <?php
                                                for($i = 1935; $i <= date("Y"); $i++)
                                                {
                                                    if($i == $year)
                                                        echo "<option value=$i selected='selected'>$i</option>";
                                                    else
                                                        echo "<option value=$i>$i</option>";
                                                }
                                                ?>
                	   	               	   </select>
                                </span>

            	<br><label>Email Address :</label>
                <br><input type="text" class="input" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value)" value="<?php echo $email;?>"/>
                <span id="email_error" style="color:red;"></span>

            	<br><label>Gender :</label>
            		               <br><select name="gender">
            		               	  <option value="male"<?php if($gender=="male"){echo "selected='selected'";} ?>>Male</option>
            		               	  <option value="female"<?php if($gender=="female"){echo "selected='selected'";} ?>>Female</option>
            		               	  <option value="other"<?php if($gender=="other"){echo "selected='selected'";} ?>>Other</option>
            		               	</select>
            </div>

            <br><input type="submit" id="update-button" name="update_button" value="Update">
    </form>
    </div>
</article>
</div>
</body>
</html>

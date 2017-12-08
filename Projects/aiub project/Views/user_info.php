<?php
require_once(get_include_path()."Projects\aiub project\Controllers\UserController.php");
require_once(get_include_path()."Projects\aiub project\Controllers\RoleController.php");
require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
require(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
$location = new LocationController();
$login = new Login();

$userid = $_SESSION["user_id"];
$usercontrol = new UserController();
$user = $usercontrol->getUser($userid);
$fname = $user["fname"];
$lname = $user["lname"];
$age = $user["age"];
$bdate = $user["bdate"];
$bdate = explode("/" , $bdate);
$day = $bdate[0];
$month = $bdate[1];
$year = $bdate[2];
$username  = $user["username"];
$email = $user["email"];
$password = $user["password"];
$pro_pic = $user["pro_pic"];
$gender = $user["gender"];
$role = $user["role"];
 ?>
<html>
<head>
    <title><?php echo $username ?> Information</title>
	<link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/index_style.css"/>
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/navigation.css"/>
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/user_info.css"/>

    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/admin_user_handler.js"></script>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/default_pp_setter.js"></script>
</head>
<body>
	<div>
	<navigation>
			<?php
				if($login->isLogged())
				{
					echo "<img id='pro_pic' src='{$_SESSION['pro_pic']}' onerror='return setDefaultPP(this)'/>";
					echo "<b class = \"navigationb\">".$login->getUsername()." , Information</b>";
				}
				else
				{
					$login->redirect("login.php?logreq=1");
				}
			?>
				<a class = 'right-li' href = 'action/logout.php'>Logout</a>
				<a class = 'right-li' href = 'user_info.php'>Profile</a>
				<a class = 'right-li' href = 'crime_post.php'>Post Crime</a>
    			<a class = 'right-li' href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/index.php'>Home</a>
	</navigation>

	<article>
        <noscript><h4 style = "color:red; text-align: center;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>
        
		<div id="profile_Form">
		<form name = "user_update_form" action="action/user_update.php?user_id=<?php echo $userid ?>&role=<?php echo $role ?>&pp=<?php echo $pro_pic ?>" method="POST" enctype="multipart/form-data" onsubmit = "return validate(<?php echo $userid ?>)">
            
            <div id="image-upload-section">
                <label id="img-label">Current Profile Picture</label>
                <br><img id="profile_pic" name="pro_pic" src="<?php echo $pro_pic ?>" onerror="return setDefaultPP(this)"/>
                <br><label id ="imginput-button" for="imginput">Upload New Picture</label>
                    <br><input id= "imginput" type="file" name="pro_pic"/>
            </div>

            <div id="data-section">
                <br><label>First Name :</label>
            <br><input type="text" class="input" name="fname" placeholder="First Name..." value="<?php echo $fname;?>"/>

            <br><label>Last Name :</label>
            <br><input type="text" class="input" name="lname" placeholder="Last Name..." value="<?php echo $lname;?>"/>

            <br><label>Birthdate : </label>
            <br><span>Day : <select id="day" name="day" >
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


                                        Month :
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


           <br><label>User Name :</label>
           <br><input type="text" class="input" name="uname" placeholder="User Name..."  onkeyup="usernameValidate(this.value,<?php echo $userid ?>)" value="<?php echo $username;?>"/>
           <span id="username_error" style="color:red;"></span>

            <br><label>Your Email Address :</label>
            <br><input type="text" class="input" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value,<?php echo $userid ?>)" value="<?php echo $email;?>"/>
            <span id="email_error" style="color:red;"></span>

            <br><label>Password :</label>
            <br><input type="text" class="input" name="pass" placeholder="password"  onkeyup="passwordValidate(this.value , signupForm.cpass.value)" value="<?php echo $password;?>"/><span id="password_error" style="color:red;"></span>

            <br>I am <select name="gender">
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

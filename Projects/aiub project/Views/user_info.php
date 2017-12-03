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
	<link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/index_style.css"/> <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/navigation.css"/>
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/user_info.css"/>
</head>
<body>
	<div>
		<navigation>
		<ul>
			<?php
				if($login->isLogged())
				{
					echo "<li><b class = \"navigationb\">".$login->getUsername()." , Information</b></li>";
				}
				else
				{
					$login->redirect("login.php?logreq=1");
				}
			?>
				<li class = "right-li"><a href = 'action/logout.php'>Logout</a></li>
    			<li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/index.php'>Home</a></li>
    	</ul>
    </navigation>

	<article>
		<div id="profile_Form">
		<form action="action/user_update.php?user_id=<?php echo $userid ?>&role=<?php echo $role ?>&pp=<?php echo $pro_pic ?>" method="POST" enctype="multipart/form-data">

            <label>Current Profile Picture</label>
            <br><img id="pro_pic" name="pro_pic" src="<?php echo $pro_pic ?>"/>

            <br><label>First Name</label>
            <br><input type="text" class="input" name="fname" placeholder="First Name..." value="<?php echo $fname;?>"/>

            <br><label>Last Name</label>
            <br><input type="text" class="input" name="lname" placeholder="Last Name..." value="<?php echo $lname;?>"/>

            <br><label>Birthdate </label>
            <br>Day<select id="day" name="day" >
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


                	                    Year
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



           <br><label>User Name </label>
           <br><input type="text" class="input" name="uname" placeholder="User Name..."  onkeyup="usernameValidate(this.value)" value="<?php echo $username;?>"/><span id="username_error" style="color:red;"></span>

            <br><label>Your Email Address</label>
            <br><input type="text" class="input" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value)" value="<?php echo $email;?>"/><span id="email_error" style="color:red;"></span>

           	<br><label>Password </label>
           	<br><input type="text" class="input" name="pass" placeholder="password"  onkeyup="passwordValidate(this.value , signupForm.cpass.value)" value="<?php echo $password;?>"/><span id="password_error" style="color:red;"></span>

            <br>I am <select name="gender">
            		               	  <option value="male"<?php if($gender=="male"){echo "selected='selected'";} ?>>Male</option>
            		               	  <option value="female"<?php if($gender=="female"){echo "selected='selected'";} ?>>Female</option>
            		               	  <option value="other"<?php if($gender=="other"){echo "selected='selected'";} ?>>Other</option>
            		    </select>


            <br><label>Change Your Profile Picture</label>
            <br><input type="file" name="pro_pic"/>

			<br><input type="submit" name="update_button" value="Update">
   		 </form>
    </article>
</div>

</body>
</html>

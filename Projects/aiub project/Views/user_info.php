<?php
require_once(get_include_path()."Projects\aiub project\Controllers\UserController.php");
require_once(get_include_path()."Projects\aiub project\Controllers\RoleController.php");

session_start();
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
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/user_info.css"/>
</head>
<body>
    <form action="action/user_update.php?user_id=<?php echo $userid ?>&role=<?php echo $role ?>" method="POST">
        <table>
            <tr>
                <td>Current Profile Picture</td>
                <td>:</td>
                <td><img id="pro_pic" src="<?php echo $pro_pic ?>"/></td>
            </tr>
            <tr>
            	<td>First Name</td> <td>:</td> <td> <input type="text" name="fname" placeholder="First Name..." value="<?php echo $fname;?>"/> </td>
            </tr>

            <tr>
                <td>Last Name</td> <td>:</td> <td> <input type="text" name="lname" placeholder="Last Name..." value="<?php echo $lname;?>"/> </td>
            </tr>

            <tr>

                <td>Birthdate </td> <td>:</td> <td>Day<select name="day" >
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
                	   	               </td>
            </tr>

            <tr>
            	<td>User Name </td> <td>:</td> <td> <input type="text" name="uname" placeholder="User Name..."  onkeyup="usernameValidate(this.value)" value="<?php echo $username;?>"/><span id="username_error" style="color:red;"></span></td>
        	</tr>

            <tr>
            	<td>Your Email Address</td> <td>:</td> <td> <input type="text" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value)" value="<?php echo $email;?>"/><span id="email_error" style="color:red;"></span> </td>
            </tr>

            <tr>
            	<td>Password </td> <td>:</td> <td> <input type="text" name="pass" placeholder="password"  onkeyup="passwordValidate(this.value , signupForm.cpass.value)" value="<?php echo $password;?>"/><span id="password_error" style="color:red;"></span></td>
            </tr>

            <tr>
            	<td>I am </td> <td>:</td> <td>
            		               <select name="gender">
            		               	  <option value="male"<?php if($gender=="male"){echo "selected='selected'";} ?>>Male</option>
            		               	  <option value="female"<?php if($gender=="female"){echo "selected='selected'";} ?>>Female</option>
            		               	  <option value="other"<?php if($gender=="other"){echo "selected='selected'";} ?>>Other</option>
            		               	</select>

            	                 </td>
            </tr>
            <tr>
                <td>Change Your Profile Picture</td>
                <td>:</td>
                <td><input type="file" name="pro_pic"/></td>
            </tr>

            <tr>
                <td> <input type="submit" name="update_button" value="Update"> </td>
            </tr>
        </table>
    </form>
</body>
</html>

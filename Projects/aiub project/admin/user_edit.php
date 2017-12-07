<?php
require_once(get_include_path()."Projects\aiub project\Controllers\UserController.php");
require_once(get_include_path()."Projects\aiub project\Controllers\RoleController.php");
$userid = 0;
if(isset($_GET["user_id"]))
    $userid = $_GET["user_id"];
$usercontrol = new UserController();
$rolecontrol = new RoleController();
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
$role = $usercontrol->getRoleName($user["role"]);
$roles = $rolecontrol->getAllRoles();
 ?>
<html>
<head>
    <title><?php echo $username ?> Information</title>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/admin_user_handler.js"></script>
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/admin_user_edit.css"/>
</head>
<body>
    <form name = "user_update_form" action="user_update.php?user_id=<?php echo $userid ?>&pp=<?php echo $pro_pic ?>" method="POST" enctype="multipart/form-data" onsubmit = "return validate(<?php echo $userid ?>)">
        <table>
            <tr>
                <td>Change Your Profile Picture</td>
                <td>:</td>
                <td><img id = "pro_pic" src='<?php echo $pro_pic ?>'/></td>
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
            	<td>User Name </td> <td>:</td> <td> <input type="text" name="uname" placeholder="User Name..."  onkeyup="usernameValidate(this.value,<?php echo $userid ?>)" value="<?php echo $username;?>"/><span id="username_error" style="color:red;"></span></td>
        	</tr>

            <tr>
            	<td>Your Email Address</td> <td>:</td> <td> <input type="text" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value,<?php echo $userid ?>)" value="<?php echo $email;?>"/><span id="email_error" style="color:red;"></span> </td>
            </tr>

            <tr>
            	<td>Password </td> <td>:</td> <td> <input type="text" name="pass" placeholder="password"  onkeyup="passwordValidate(this.value)" value="<?php echo $password;?>"/><span id="password_error" style="color:red;"></span></td>
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
            	<td>Role:</td> <td>:</td> <td>
            		               <select name="role">
                                       <?php
                                            while($r = $roles->fetch_assoc())
                                            {
                                                if($r["role_name"] == $role)
                                                    echo "<option value = {$r['role_id']} selected='selected'>{$r['role_name']}</option>";
                                                else
                                                    echo "<option value = {$r['role_id']}>{$r['role_name']}</option>";
                                            }
                                        ?>
            		               	</select>

            	                 </td>
            </tr>

            <tr>
                <td>Change Profile Picture</td>
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

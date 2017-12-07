<!--<?php
/*
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
 */
?>-->
<html>
<head>
    <title><?php echo $username ?> |Criminal Information</title>
    <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/admin_user_handler.js"></script>
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/admin_user_edit.css"/>
</head>
<body>
    <form name = "criminal_update_form" action="" method="POST" enctype="multipart/form-data" onsubmit = "return validate(<?php echo $userid ?>)">
        
                <label>Change Your Profile Picture :</label>
                <br><img id = "pro_pic" src='<?php echo $pro_pic ?>'/>
            
            	<br><label>First Name :</label>
                <br><input type="text" name="fname" placeholder="First Name..." value="<?php echo $fname;?>"/>
                
                <br><label>Last Name :</label>
                <br><input type="text" name="lname" placeholder="Last Name..." value="<?php echo $lname;?>"/>


                <br><label>Birthdate :</label>
                <br><span>Day <select name="day" >
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
                                </span>
                
            	<br><label>User Name :</label>
                <br><input type="text" name="uname" placeholder="User Name..."  onkeyup="usernameValidate(this.value,<?php echo $userid ?>)" value="<?php echo $username;?>"/>
                <span id="username_error" style="color:red;"></span>
        	
            	<br><label>Email Address :</label>
                <br><input type="text" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value,<?php echo $userid ?>)" value="<?php echo $email;?>"/>
                <span id="email_error" style="color:red;"></span>

            	<br><label>Gender :</label>
            		               <br><select name="gender">
            		               	  <option value="male"<?php if($gender=="male"){echo "selected='selected'";} ?>>Male</option>
            		               	  <option value="female"<?php if($gender=="female"){echo "selected='selected'";} ?>>Female</option>
            		               	  <option value="other"<?php if($gender=="other"){echo "selected='selected'";} ?>>Other</option>
            		               	</select>

            
            	<br><label>Role:</label>
            		               <br><select name="role">
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
    
            <br><label>Change Profile Picture :</label>
            <br><input type="file" name="pro_pic"/>
            <br><input type="submit" name="update_button" value="Update">
    </form>
</body>
</html>

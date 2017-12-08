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
    <link rel="stylesheet" href="http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/css/admin_user_edit.css"/>
</head>
<body>
    <form name = "criminal_update_form" action="criminal_update.php?criminal_id=<?php echo $id ?>&pp=<?php echo $pro_pic ?>" method="POST" enctype="multipart/form-data" onsubmit = "return validate()">

                <label>Change Your Profile Picture :</label>
                <br><img id = "pro_pic" src='<?php echo $pro_pic ?>'/>

            	<br><label>First Name :</label>
                <br><input type="text" name="fname" placeholder="First Name..." value="<?php echo $fname;?>"/>

                <br><label>Last Name :</label>
                <br><input type="text" name="lname" placeholder="Last Name..." value="<?php echo $lname;?>"/>


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
                <br><input type="text" name="email" placeholder="xyz@dmail.com..." onkeyup="emailValidate(this.value)" value="<?php echo $email;?>"/>
                <span id="email_error" style="color:red;"></span>

            	<br><label>Gender :</label>
            		               <br><select name="gender">
            		               	  <option value="male"<?php if($gender=="male"){echo "selected='selected'";} ?>>Male</option>
            		               	  <option value="female"<?php if($gender=="female"){echo "selected='selected'";} ?>>Female</option>
            		               	  <option value="other"<?php if($gender=="other"){echo "selected='selected'";} ?>>Other</option>
            		               	</select>

            <br><label>Change Profile Picture :</label>
            <br><input type="file" name="pro_pic"/>
            <br><input type="submit" name="update_button" value="Update">
    </form>
</body>
</html>

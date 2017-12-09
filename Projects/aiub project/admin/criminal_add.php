<html>
<head>
	<title>Criminal SignUP Page</title>
	<script src = "../js/criminal_handler.js"></script>
  <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/default_pp_setter.js"></script>
   <script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/profile_picture_previewer.js"></script>

  <link rel="stylesheet" type="text/css" href="http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/css/admin_navigation.css">
  <link rel="stylesheet" type="text/css" href="../css/signup_style.css">
</head>

<body onload = "addYears()">
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

    <div id = "signup-form">
        <form name = "criminal_form" action = "http://localhost:<?php echo $_SERVER['SERVER_PORT'] ?>/Projects/aiub project/admin/putCriminal.php" method = "POST" enctype="multipart/form-data" onsubmit="return validate()">

          <p id = "signup-title">Create an Account For Criminal</p>

          <div id ="image-upload-section">
            <img id="profile_pic" name="pro_pic" src="<?php echo $pro_pic ?>" onerror="return setDefaultPP(this)"/>
            <br><label id ="imginput-button" for="imginput">Choose Profile Picture</label>
            <br><input type = "file" id ="imginput" name = "propic" value =  "<?php if(isset($_SESSION["signup_data"]))echo $_SESSION["signup_data"]["propic"];?>"  onchange="preview(this)"/>
         </div>

           <div id="data-section">
            <!--First Name Row-->
            <label><sup style="color:red;">*</sup>First Name :</label>
            <br><input type="text" class="input" name="fname" placeholder="First Name..." value = "<?php ?>" /> <!--Checking for returned values -->


            <!--Last Name Row-->
            <br><label><sup style="color:red;">*</sup>Last Name :</label>
            <br><input type="text" class="input" name="lname" placeholder="Last Name..." value =  "<?php ?>" />

            <!--Birthdate Row-->
            <br><label><sup style="color:red;">*</sup>Birthdate :</label>
            <br><span id="date-input">Day
                <select id = "day" name="day" >
                            <option value="1">1 </option>
                            <option value="2">2 </option>
                            <option value="3">3 </option>
                            <option value="4">4 </option>
                            <option value="5">5 </option>
                            <option value="6">6 </option>
                            <option value="7">7 </option>
                            <option value="8">8 </option>
                            <option value="9">9 </option>
                            <option value="10">10 </option>
                            <option value="11">11 </option>
                            <option value="12">12 </option>
                            <option value="13">13 </option>
                            <option value="14">14 </option>
                            <option value="15">15 </option>
                            <option value="16">16 </option>
                            <option value="17">17 </option>
                            <option value="18">18 </option>
                            <option value="19">19 </option>
                            <option value="20">20 </option>
                            <option value="21">21 </option>
                            <option value="22">22 </option>
                            <option value="23">23 </option>
                            <option value="24">24 </option>
                            <option value="25">25 </option>
                            <option value="26">26 </option>
                            <option value="27">27 </option>
                            <option value="28">28 </option>
                            <option value="29">29 </option>
                            <option value="30">30 </option>
                            <option value="31">31 </option>
                        </select>
                                Month
                                   <select name="month">
                                      <option value="jan">January</option>
                                      <option value="feb">February</option>
                                      <option value="mar">March</option>
                                      <option value="apr">April</option>
                                      <option value="may">May</option>
                                      <option value="jun">June</option>
                                      <option value="jul">July</option>
                                      <option value="aug">August</option>
                                      <option value="sep">September</option>
                                      <option value="oct">October</option>
                                      <option value="nov">November</option>
                                      <option value="dec">December</option>
                                   </select>
                                Year
                                   <select name="year">
                                   </select>
                               </span>


        <!--Email Row-->
        <br><label><sup style="color:red;">*</sup>Email Address :</label>
        <br><input  type="text" class="input" name="email" placeholder="xyz@dmail.com..." value =  "<?php ?>" onkeyup="emailValidate(this.value)" /><span id="email_error" style="color:red;"></span>

        <!--Gender Row-->
        <br><label ><sup style="color:red;">*</sup>Gender :</label>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
        </div>

    <!--Submit button Row-->
    <br><input type="submit" id="signup-button" name="submit" value="Sign UP">
 </form>
</div>
 <?php
 	if(isset($_SESSION["signup_data"]))
		session_unset("signup_data");
 ?>
</article>
</div>
</body>
</html>

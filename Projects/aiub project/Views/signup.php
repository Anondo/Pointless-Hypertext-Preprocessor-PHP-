<html>
<head>
	<title>SignUP Page</title>
	<script src = "../js/signup_handler.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/index_style.css">
</head>

<body onload = "addYears()">
<div>
    <navigation>
        <ul>  
            <li><b class = "navigationb">Hello World</b></li>  
        	<li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/Views/crime_post.php'>Post Crime</a></li>
             <li class = "right-li"><a href = 'http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/index.php'>Home</a></li>
	    </ul>
    </navigation>

    <article>
        <noscript><h4 style = "color:red; text-align: center;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>
        <h3 id = "signup-title">Create an Account</h3>
        <?php session_start();?>
    <div id = "signup-form">
        <form name = "signupForm" action = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/Views/action/register_user.php/?js_enabled=false" method = "POST" enctype="multipart/form-data" onsubmit="return validate()">
            
            <!--First Name Row-->
            <label>First Name</label>
            <br><input type="text" class="input" name="fname" placeholder="First Name..." value = "<?php if($_SESSION)echo $_SESSION["signup_data"]["fname"];?>" /> <!--Checking for returned values -->
        

            <!--Last Name Row-->
            <br><label>Last Name </label>
            <br><input type="text" class="input" name="lname" placeholder="Last Name..." value =  "<?php if($_SESSION)echo $_SESSION["signup_data"]["lname"];?>" /> 

            <!--Birthdate Row-->
            <br><label>Birthdate </label>
            <br>Day 
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

        <!--User Name Row-->
        <br><label>User Name</label>
        <br><input type="text" class="input" name="uname" placeholder="User Name..." value =  "<?php if($_SESSION)echo $_SESSION["signup_data"]["uname"];?>" onkeyup="usernameValidate(this.value)"/><span id="username_error" style="color:red;"></span>

        <!--Email Row-->
        <br><label>Your Email Address</label>
        <br><input  type="text" class="input" name="email" placeholder="xyz@dmail.com..." value =  "<?php if($_SESSION)echo $_SESSION["signup_data"]["email"];?>" onkeyup="emailValidate(this.value)" /><span id="email_error" style="color:red;"></span>

        <!--Password Row-->
        <br><label>Password</label>
        <br><input type="Password" class="input" name="pass" placeholder="password" value =  "<?php if($_SESSION)echo $_SESSION["signup_data"]["pass"];?>" onkeyup="passwordValidate(this.value , signupForm.cpass.value)"/><span id="password_error" style="color:red;font-size:14px;font-weight:italic;"></span>

        <!--Confirm Password Row-->
        <br><label>Confirm Password</label> 
        <br><input type="Password" class="input" name="cpass" placeholder = "RE-type password" value =  "<?php if($_SESSION)echo $_SESSION["signup_data"]["cpass"];?>"onkeyup="passwordValidate(signupForm.pass.value , this.value)" />

        <!--Gender Row-->
        <br><label >I am </label>
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

        <br><label for = "imginput">
                 <img src="../img/image_logo.jpg" height="30" width="35"/> Choose Your Profile Picture
            </label>
            <input type = "file" id ="imginput" name = "propic" value =  "<?php if($_SESSION)echo $_SESSION["signup_data"]["propic"];?>" />

    <!--Submit button Row-->
    <br><input type="submit" id="signup-button" name="submit" value="Sign UP">
 </form>
</div>
 <?php
    session_destroy();
 ?>
</article>
</div>
</body>
</html>

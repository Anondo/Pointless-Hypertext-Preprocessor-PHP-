<!DOCTYPE html>

<html>
<head>
	<title>Post</title>
	
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<link rel="stylesheet" type="text/css" href="../css/postcrime_style.css">

	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/blog_handler.js"></script>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/location_handler.js"></script>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub%20project/js/default_pp_setter.js"></script>
</head>
<body>
<div>
	<navigation>
		
			<?php
				require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
				require(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
				$location = new LocationController();
				$login = new Login();
				if($login->isLogged())
				{
					echo "<img id='pro_pic' src='{$_SESSION['pro_pic']}' onerror='return setDefaultPP(this)'/>";
					echo "<b class = \"navigationb\">Welcome ".$login->getUsername(). " , share your post!</b>";
				}
				else
				{
					$login->redirect("login.php?logreq=1");
				}
				echo "<a class = 'right-li' href = 'action/logout.php'>Logout</a>";
				if($login->isLogged())
					echo "<a class = 'right-li' href = 'user_info.php'>Profile</a>";
				else
					echo "<a class = 'right-li' href = 'signup.php'>Signup</a>";
				echo "<a class = 'right-li' href = 'crime_post.php'>Post Crime</a>";
				echo "<a class = 'right-li' href = 'http://localhost:".$_SERVER['SERVER_PORT']."/Projects/aiub project/index.php'>Home</a>";	
			?>
    </navigation>

    <article>
    	<noscript><h4 style = "color:red; text-align: center;">Enable Javascript in your browser to access all the features of this web page.</h4></noscript>
    	<div id = "post-container-box">

    	<form name = "blog_form" method = "POST" action = "action/putblog.php" enctype="multipart/form-data"  onsubmit="return updateCrimeOnLocation(this.location.value)">

			<div id="div-title-post">
				<label><b><sup>* </sup>Title :</b></label><br>
				<input type="text" id ="title-post" name="title" placeholder="Title" onkeyup="nothing_wrong()">
			</div>

			<div id = "mini-div-container">	
			<div id = "mini-div">
				<div id = "mini-div-box-1">
					<label><b>Place:</b></label><br>
					<select id="select-location" name ="location">
					<?php
						foreach($location->getLocations() as $loc)
						{
							echo "<option value = $loc>$loc</option>";
						}
				 	?>
					</select>
				</div>
				<div id = "mini-div-box-2">
					<label><b>Details(location):</b></label><br>
					<input id="select-detailedlocation" type = "text" name = "secloc" placeholder="detailed location" />
				</div>

				<div id = "mini-div-box-3">
					<label><b>Category:</b></label><br>
					<select id="select-category" name ="category">
						<option value = "robbery"> Robbery </option>
						<option value = "murder"> Murder </option>
						<option value = "rape"> Rape </option>
						<option value = "hijacking"> Hijacking </option>
						<option value = "other"> Other </option>
					</select>
				</div>
			</div>

			<div id="div-description-body">
   				<label><b><sup>* </sup>Description : </b></label><br>
				<textarea id="description-body" name="body" cols = "120" rows="8" style="resize:none;" placeholder=" write here ...." onkeyup="nothing_wrong()"></textarea>
			</div>
		</div>
			<div id="div-button-etc">
		 		<br><input type="checkbox" name="hideme" value = "hide me"> <strong>hide me </strong>
				<input type = "file" name = "attchmnt" />
				<br><button id="post-button" onclick="return nothing_wrong()"> post</button>
			</div>

			<span id = "blogDetails_error" style="color:red;"></span>
		</form>
	</div>
</article>
</div>
</body>
</html>

<!DOCTYPE html>

<html>
<head>
	<title>Post</title>
	<link rel="stylesheet" type="text/css" href="../css/index_style.css">
	<link rel="stylesheet" type="text/css" href="../css/navigation.css">
	<link rel="stylesheet" type="text/css" href="../css/postcrime_style.css">

	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/blog_handler.js"></script>
	<script src = "http://localhost:<?php echo  $_SERVER["SERVER_PORT"];?>/Projects/aiub project/js/location_handler.js"></script>
</head>
<body>
<div>
	<navigation>
		<ul>
			<?php
				require(get_include_path()."\Projects\aiub project\Controllers\login_controller.php");
				require(get_include_path()."\Projects\aiub project\Controllers\LocationController.php");
				$location = new LocationController();
				$login = new Login();
				if($login->isLogged())
				{
					echo "<li><img id='pro_pic' src='{$_SESSION['pro_pic']}'/></li>";
					echo "<li><b class = \"navigationb\">Welcome ".$login->getUsername(). " , share your post!</b></li>";
				
				}
				else
				{
					$login->redirect("login.php?logreq=1");
				}
				echo "<li class = \"right-li\"><a href = 'action/logout.php'>Logout</a></li>";
				if($login->isLogged())
					echo "<li class = \"right-li\"><a href = 'user_info.php'>Profile</a></li>";
				else
					echo "<li class = \"right-li\"><a href = 'signup.php'>Signup</a></li>";
				echo "<li class = \"right-li\"><a href = 'crime_post.php'>Post Crime</a></li>";
				echo " <li class = \"right-li\"><a href = 'http://localhost:".$_SERVER['SERVER_PORT']."/Projects/aiub project/index.php'>Home</a></li>";
				
			?>
				
    			
    	</ul>
    </navigation>

    <article>
    	<div id = "post-container-box">
    	<form name = "blog_form" method = "POST" action = "action/putblog.php" enctype="multipart/form-data" onsubmit="return updateCrimeOnLocation(blog_form.location.value)">

			<div id="div-title-post">
				<input type="text" id ="title-post" name="title" placeholder="Title" onkeyup="nothing_wrong()">
			</div>

			<div id = "mini-div">
					<div id = "mini-div-box-1">
						<label>Place:</label><br>
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
				<label>Details(location):</label><br>
				<input id="select-location" type = "text" name = "secloc" />
			</div>
			<div id = "mini-div-box-3">
				<label>Category:</label><br>
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
   				<label><b> Description : </b></label><br>
				<textarea id="description-body" name="body" cols = "120" rows="6" placeholder=" write here ...." onkeyup="nothing_wrong()"></textarea>
			</div>

			<div id="div-button-etc">
		 		<br><button id="post-button" onclick="return nothing_wrong()"> post</button>
				<input type="checkbox" name="hideme" value = "hide me"> <strong>hide me </strong>
				<input type = "file" name = "attchmnt" />
			</div>
    
			<span id = "blogDetails_error" style="color:red;"></span>
		</form>
	</div>
</article>
</div>
</body>
</html>

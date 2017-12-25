<?php

 if(isset($_GET["key"]) && isset($_GET["value"] ))
	{
		require_once (__DIR__."\..\..\Controllers\BlogController.php");
		$blog_control = new BlogController();
		$jsonBlogs = $blog_control->getBlogBy($_GET["key"],$_GET["value"]);
		echo $jsonBlogs;
		}





?>

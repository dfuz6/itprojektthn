<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("login_template.php", array("title"=>"login"));
	} else if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!isset($_POST["username"]) || !isset($_POST["password"]))
		{
			return;
		}
		
		else
		{
			$username = $_POST["username"];
			$_SESSION["username"] = $username;
			redirect("index.php");
		}
	}
?>
<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("register_template.php", array("title"=>"Register"));
	} else if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!isset($_POST["usernameInput"]) || !isset($_POST["passwordInput"]))
		{
			return;
		}
		
		else
		{
			$username = $_POST["usernameInput"];
			$_SESSION["username"] = $username;
			redirect("index.php");
		}
	}
?>
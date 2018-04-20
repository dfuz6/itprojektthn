<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(!isset($_GET["username"])){
			$_GET["username"] = $_SESSION["username"];
		}
		render("user_template.php", array("title"=>"login", "username"=>$_GET["username"]));
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
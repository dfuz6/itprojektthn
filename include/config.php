<?php
	require("function.php");
	
	session_start();
	
	if(basename($_SERVER["PHP_SELF"]) !== "login.php" && basename($_SERVER["PHP_SELF"]) !== "register.php" && basename($_SERVER["PHP_SELF"]) !== "leaderboard.php" && !isset($_SESSION["username"]))
	{
		redirect("login.php");
	}
?>
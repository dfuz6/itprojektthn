<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("leaderboard_template.php", array("title"=>"Bestenliste"));
	}else{
		die();
	}
?>
<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("all_user_template.php", array("title"=>"Users"));
	} 
?>
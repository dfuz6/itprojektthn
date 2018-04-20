<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("create_multichoice_template.php", array("title"=>"Create a quiz"));
	}else{
		die();
	}
?>
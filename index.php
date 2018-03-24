<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(!isset($_SESSION["username"]))
		{
			redirect("login.php");
		} else if(!isset($_GET["questiontype"])){
			$username = $_SESSION["username"];
			//render("question_template.php", array("title"=>"Aufgabe"));
			render("choose_module_template.php", array("title"=>"Choose a module"));
		} else{
			if ($_GET["questiontype"] == 1){
				render("question_template.php", array("title"=>"Aufgabe", "questiontype"=>1));
			} elseif ($_GET["questiontype"] == 2){
				render("question_template.php", array("title"=>"Aufgabe", "questiontype"=>2));
			} elseif ($_GET["questiontype"] == 3){
				render("question_template.php", array("title"=>"Aufgabe", "questiontype"=>3));
			}
		}
	}
	
?>
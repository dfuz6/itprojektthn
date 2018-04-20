<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(!isset($_GET["catogory"])){
			$_GET["category"] = "Schaltungen";
		}
			
		render("question_list.php", array("title"=>"Aufgabenliste", "category"=>$_GET["category"]));
	
	}
			
		
	
?>
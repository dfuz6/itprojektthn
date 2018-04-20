<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		if(!isset($_SESSION["username"]))
		{
			redirect("login.php");
		} else if(isset($_GET["module"])){
			if($_GET["module"]=="numbersystem"){
					if(!isset($_GET["questiontype"])){
					$username = $_SESSION["username"];
					if(isset($_GET["smodule"])){
						if($_GET["smodule"]=="question"){
							if(isset($_GET["id"])){
								render("multichoice_question_template.php", array("title"=>"Question", "id"=>$_GET["id"], "category"=>"Zahlensysteme"));
							}else{
								render("choose_question_numbersystem.php", array("title"=>"Choose a question"));
							}
						}
					}
					else{
					render("choose_module_number_system.php", array("title"=>"Choose a module"));
					}
				} else{
					$username = $_SESSION["username"];
					if ($_GET["questiontype"] == 1){
						render("question_template.php", array("title"=>"Aufgabe", "username"=>$username, "questiontype"=>1));
					} elseif ($_GET["questiontype"] == 2){
						render("question_template.php", array("title"=>"Aufgabe","username"=>$username, "questiontype"=>2));
					} elseif ($_GET["questiontype"] == 3){
						render("question_template.php", array("title"=>"Aufgabe", "username"=>$username, "questiontype"=>3));
					}
				}
			}
			else if($_GET["module"]=="circuitry"){
				if(isset($_GET["id"])){
					render("multichoice_question_template.php", array("title"=>"Question", "id"=>$_GET["id"], "category"=>"Schaltungen"));
				}else{
					render("choose_question_circuitry.php", array("title"=>"Choose a question"));
				}
	
			}
			else if($_GET["module"]=="assembler"){
				if(isset($_GET["id"])){
					render("multichoice_question_template.php", array("title"=>"Question", "id"=>$_GET["id"], "category"=>"Assemmbler"));
				}else{
					render("choose_question_assembler.php", array("title"=>"Choose a question"));
				}
			}
	} else{
		render("choose_module_all.php", array("title"=>"Choose a module"));
	}
}
	
?>
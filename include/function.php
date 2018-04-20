<?php
	require("constant.php");	
	
	function logout()
	{
		 $_SESSION = array();
        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }
        // destroy session
        session_destroy();
	}
	
	function render($template, $value = array())
	{
		if(file_exists("templates/$template"))
		{
			extract($value);
			
            // render header
            require("templates/header.php");
		
	        // render taskbar
	    	require("templates/taskbar.php");
            
			// render template
            require("templates/$template");

            // render footer
            require("templates/footer.php");
		}
		
		else trigger_error("Template does not existed", E_USER_ERROR);
	}
	
	function renderSideMenu($template, $value = array()){
		if(file_exists("templates/$template"))
		{
			extract($value);
			
            require("templates/$template");
		}
		
		else trigger_error("Template does not existed", E_USER_ERROR);
	}
	
	function redirect($page)
	{
		header("Location: $page");
		exit;
	}

?>
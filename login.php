<?php
	session_start();

	if(isset($_SESSION["login"]))
	{
		if($_POST["pwd"]=='1234')
		{
			$_SESSION["login"]=1;
			if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    	}
		}
	}
?>

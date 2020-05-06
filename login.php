<?php
	session_start();

	if(isset($_SESSION["login"]))
	{
		if($_POST["pwd"]=='1234')
		{
			$_SESSION["login"]=1;
			header("Location: index.php");
		}
	}
?>

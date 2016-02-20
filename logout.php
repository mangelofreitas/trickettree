<?php


	session_start();
	if(isset($_SESSION['name']))
	{
		unset($_SESSION['name']);
	}
	if(isset($_SESSION['picture']))
	{
		unset($_SESSION['picture']);
	}
	if(isset($_SESSION['loggedin']))
	{
		unset($_SESSION['loggedin']);
	}
	session_destroy();
	header("location:index.php");


?>

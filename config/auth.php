<?php 
$loggedInUser="";

if(!isset($_SESSION)) 
 { 
	 session_start(); 

	if (!isset($_SESSION['username'])) {
		# code...
		//header("Location: login.php");
		//exit;
	}
	else
	{
		$loggedInUser= $_SESSION['username'];
	}


  } 

//session_start();



?>
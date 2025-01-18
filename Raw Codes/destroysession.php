<?php
	session_start();
	
	session_unset();
	// destroy the session
	session_destroy(); 
	//print_r($_SESSION);

	header('Location: index.php');
?>
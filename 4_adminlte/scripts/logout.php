<?php
	session_start();
	//echo session_status(); //2
	//echo session_id()."<br>";
	session_destroy();
	//echo session_status(); //1
	session_start();
	session_regenerate_id();
	//echo session_id()."<br>";
	$_SESSION["success"] = "Prawidłowo wylogowano użytkownika";
	header("location: ../pages");
<?php
	session_start();
//		echo "<pre>";
//			print_r($_POST);
//		echo "</pre>";

foreach ($_POST as $value){
	if (empty($value)){
		$_SESSION["error"] = "Wypełnij wszystkie pola!";
		echo "<script>history.back()</script>";
		exit();
	}
}

$error = 0;

if (!isset($_POST["terms"])){
	$_SESSION["error"] = "Zaznacz regulamin!";
	$error = 1;
}

echo "ok";
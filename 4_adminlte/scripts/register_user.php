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

if ($_POST["pass1"] != $_POST["pass2"]){
	$_SESSION["error"] = "Hasła są różne!";
	$error = 1;
}

if ($_POST["email1"] != $_POST["email2"]){
	$_SESSION["error"] = "Adresy email są różne!";
	$error = 1;
}

if ($error != 0){
	echo "<script>history.back()</script>";
	exit();
}

echo "ok";
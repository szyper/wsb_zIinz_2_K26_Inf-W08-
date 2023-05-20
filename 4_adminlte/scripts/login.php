<?php
//session_destroy();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	foreach ($_POST as $value){
		if (empty($value)){
			$_SESSION["error"] = "Wypełnij wszystkie pola!";
			echo "<script>history.back()</script>";
			exit();
		}
	}

	require_once "./connect.php";

	try {
		$stmt = $conn->prepare("SELECT * FROM USERS WHERE email=?");
		$stmt->bind_param("s", $_POST["email"]);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		$stmt->close();
		//echo $user["email"]." ".$user["password"];

		if (password_verify($_POST["pass"], $user["password"])){
			//zalogowany
			$_SESSION["logged"]["firstName"] = $user["firstName"];
			$_SESSION["logged"]["lastName"] = $user["firstName"];
			$_SESSION["logged"]["logged_in"] = true;
			$_SESSION["logged"]["role_id"] = $user["role_id"];
			//session_regenerate_id();
			$_SESSION["logged"]["session_id"] = session_id();
			//echo session_id();


			//czas sesji
			//session.gc_maxlifetime=1440  => php.ini
			//$max_lifetime = ini_get('session.gc_maxlifetime');
			//echo $max_lifetime; //1440s => 24 minuty

			//ustawienie czasu trwania sesji

			//ini_set('session.gc_maxlifetime', 1800); //30 minut
			//session_set_cookie_params(1800);
			/*
			session_start();
			exit();
			*/

			//setcookie("session_id_cookie", session_id());
			setcookie("session_id_cookie", session_id(), time() + 3600, '/', 'localhost');
			//setcookie("session_id_cookie", session_id(), time() + 3600);
			echo "ciasteczko: ".$_COOKIE["session_id_cookie"]."<br>sesja: ".$_SESSION["logged"]["session_id"];

			header("location: ../pages/logged.php");
			exit();
		}else{
			//niezalogowany
			$_SESSION["error"] = "Błędny login lub hasło!";
			echo "<script>history.back()</script>";
		}

	}catch (mysqli_sql_exception $e){
		$_SESSION["error"] = "Błędne dane: ". $e->getMessage();
		echo "<script>history.back()</script>";
		exit();
	}
}

header("location: ../pages");
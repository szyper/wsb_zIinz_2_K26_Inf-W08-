<?php
session_start();
//	var_dump($_POST);
foreach ($_POST as $key => $value){
//	echo "$key: $value<br>";
	if (empty($value)){
//		echo "$key<br>";
		//header("location: ../3_db/4_db_table_delete_add.php");
		echo "<script>history.back();</script>";
		$_SESSION["error"] = "Wypełnij wszystkie pola np. $key";
//		echo "error";
		exit();
	}
}

require_once "./connect.php";
$sql = "INSERT INTO `users` (`id`, `city_id`, `firstName`, `lastName`, `birthday`) VALUES (NULL, '$_POST[city_id]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[birthday]');";
$conn->query($sql);

if ($conn->affected_rows != 0){
	$_SESSION["error"] = "Prawidłowo dodano użytkownika";
}else{
	$_SESSION["error"] = "Nie dodano użytkownika!";
}

header("location: ../3_db/5_db_table_delete_add_update.php");
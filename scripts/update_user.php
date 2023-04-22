<?php
session_start();
foreach ($_POST as $key => $value){
	if (empty($value)){
		echo "<script>history.back();</script>";
		$_SESSION["error"] = "Wypełnij wszystkie pola np. $key";
		exit();
	}
}

require_once "./connect.php";
//$sql = "INSERT INTO `users` (`id`, `city_id`, `firstName`, `lastName`, `birthday`) VALUES (NULL, '$_POST[city_id]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[birthday]');";
$sql = "UPDATE `users` SET `city_id` = '$_POST[city_id]', `firstName` = '$_POST[firstName]', `lastName` = '$_POST[lastName]', `birthday` = '$_POST[birthday]' WHERE `users`.`id` = $_SESSION[updateUserId];";
$conn->query($sql);

if ($conn->affected_rows != 0){
	$_SESSION["error"] = "Prawidłowo zaktualizowano użytkownika";
}else{
	$_SESSION["error"] = "Nie zaktualizowano użytkownika!";
}

header("location: ../3_db/5_db_table_delete_add_update.php");
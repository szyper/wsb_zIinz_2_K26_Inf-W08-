<?php
session_start();
//	echo "<h4>Usuwanie użytkownika</h4>";
//print_r($_GET);
//var_dump($_GET);
require_once "./connect.php";
$sql = "DELETE FROM users WHERE `users`.`id` = $_GET[userId]";
//$sql = "DELETE FROM users WHERE `users`.`firstName` = 'x'";
$conn->query($sql);


if ($conn->affected_rows != 0){
	$_SESSION["error"] = "Prawidłowo zaktualizowano użytkownika";
}else{
	$_SESSION["error"] = "Nie zaktualizowano użytkownika!";
}

if ($conn->affected_rows == 0){
//	header("location: ../3_db/3_db_table_delete.php?deleteUserId=0");
	$_SESSION["error"] = "Nie usunięto użytkownika";
	header("location: ../3_db/5_db_table_delete_add_update.php?deleteUserId=0");
}else{
//	header("location: ../3_db/3_db_table_delete.php?deleteUserId=$_GET[userId]");
	$_SESSION["error"] = "Usunięto użytkownika o id=$_GET[userId]";

	header("location: ../3_db/5_db_table_delete_add_update.php?deleteUserId=$_GET[userId]");
}

<?php
//	var_dump($_POST);
foreach ($_POST as $key => $value){
//	echo "$key: $value<br>";
	if (empty($value)){
//		echo "$key<br>";
		header("location: ../3_db/4_db_table_delete_add.php");
//		echo "error";
		exit();
	}
}

require_once "./connect.php";
$sql = "INSERT INTO `users` (`id`, `city_id`, `firstName`, `lastName`, `birthday`) VALUES (NULL, '$_POST[city_id]', '$_POST[firstName]', '$_POST[lastName]', '$_POST[birthday]');";
$conn->query($sql);
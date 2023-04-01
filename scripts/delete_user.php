<?php
//	echo "<h4>Usuwanie użytkownika</h4>";
//print_r($_GET);
//var_dump($_GET);
require_once "./connect.php";
$sql = "DELETE FROM users WHERE `users`.`id` = $_GET[userId]";
//$sql = "DELETE FROM users WHERE `users`.`firstName` = 'x'";
$conn->query($sql);
if ($conn->affected_rows == 0){
	header("location: ../3_db/3_db_table_delete.php?deleteUserId=0");
}else{
	header("location: ../3_db/3_db_table_delete.php?deleteUserId=$_GET[userId]");
}

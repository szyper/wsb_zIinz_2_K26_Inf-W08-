<?php
  session_start();
?>
<!doctype html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/table.css">
	<title>Użytkownicy</title>
</head>
<body>
<h4>Użytkownicy</h4>
<?php
  if (isset($_GET["deleteUserId"])){
	  if ($_GET["deleteUserId"] == 0){
		  echo "Nie udało się usunąć rekordu!<hr>";
	  }else{
		  echo "Udało się usunąć rekordu o id=$_GET[deleteUserId]<hr>";
	  }
  }

  if (isset($_SESSION["error"])){
    echo "<h4>$_SESSION[error]</h4>";
    unset($_SESSION["error"]);
  }
?>

<table>
  <tr>
    <th>Imię</th>
    <th>Nazwisko</th>
    <th>Data urodzenia</th>
    <th>Miasto</th>
    <th>Województwo</th>
    <th>Państwo</th>
  </tr>
<?php
	require_once "../scripts/connect.php";
$sql = "SELECT `u`.`id` `userid`, `u`.`firstName` as `imie`, `u`.`lastName`, `u`.`birthday`, `c`.`city`, `s`.`state`, `co`.`country` FROM `users` u JOIN `cities` c ON `u`.`city_id`=`c`.`id` JOIN `states` s ON `c`.`state_id`=`s`.`id` JOIN `countries` co ON `s`.`country_id`=`co`.`id`;";
  $result = $conn->query($sql);
//  echo $result->num_rows;
if ($result->num_rows == 0){
  echo "<tr><td colspan='6'>Brak rekordów do wyświetlenia</td></tr>";
}else{
	while($user = $result->fetch_assoc()){
		echo <<< TABLEUSERS
      <tr>
        <td>$user[imie]</td>
        <td>$user[lastName]</td>
        <td>$user[birthday]</td>
        <td>$user[city]</td>
        <td>$user[state]</td>
        <td>$user[country]</td>
        <td><a href="../scripts/delete_user.php?userId=$user[userid]">Usuń</a></td>
      </tr>
TABLEUSERS;
	}
}

  echo "</table><hr>";
  if (isset($_GET["add_user"])){
    echo <<< ADDUSERFORM
      <h4>Dodawanie użytkownika</h4>
      <form action="../scripts/add_user.php" method="post">
        <input type="text" name="firstName" placeholder="Dodaj imię" autofocus required><br><br>
        <input type="text" name="lastName" placeholder="Dodaj nazwisko"><br><br>
        <input type="date" name="birthday">Data urodzenia<br><br>

        <select name="city_id">
ADDUSERFORM;
        $sql = "SELECT id, city from cities;";
        $result = $conn->query($sql);
        while ($city = $result->fetch_assoc()){
          echo "<option value='$city[id]'>$city[city]</option>";
        }
	    echo <<< ADDUSERFORM
        </select><br><br>
        <input type="submit" value="Dodaj użytkownika">
      </form>
ADDUSERFORM;
  }else{
    echo '<a href="./4_db_table_delete_add.php?add_user=1">Dodaj użytkownika</a>';
  }

  $conn->close();
?>

</body>
</html>

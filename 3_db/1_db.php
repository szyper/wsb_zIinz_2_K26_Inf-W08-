<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DB</title>
  </head>
  <body>
    <h4>Użytkownicy z bazy</h4>
<?php
  require_once "../scripts/connect.php";
  $sql = "SELECT * FROM `user`;";
  $result = $conn->query($sql);
  //$user = $result->fetch_assoc();
  //echo "$user[firstName]";

  while ($user = $result->fetch_assoc()) {
    echo <<< USER
      Imię i nazwisko: $user[firstName] $user[lastName]<br>
USER;
  }
?>
  </body>
</html>

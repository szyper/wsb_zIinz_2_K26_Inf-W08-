<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h4>Lista</h4>
<ul>
  <li>Poznań</li>
  <li>Gniezno</li>
  <li>Jarocin</li>
</ul>
<?php
  $city = "Września";
  echo <<< LIST
    <ul>
      <li>Poznań</li>
      <li>Gniezno</li>
      <li>Jarocin</li>
      <li>$city</li>
    </ul>
LIST;
 ?>
 <h3>Zawartość skryptu:</h3>
<?php
  //include, include_once, require, require_once
  //include "./scripts/script1.php";
  @include "./scripts/script1.php";
  include_once "./scripts/script.php";

  //require "./scripts/script1.php";

  echo "Zawartość po skrypcie";
?>
  </body>
</html>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
  $firstName = "Janusz";
  $lastName = "Nowak";

  echo "Imię i nazwisko: $firstName $lastName<br>";
  echo 'Imię i nazwisko: $firstName $lastName<br>';

//heredoc
  echo <<< DATA
    <hr>
    Imię: $firstName<br>
    Nazwisko: $lastName<br>
DATA;

$data = <<< DATA
  <hr>
  Imię: $firstName<br>
  Nazwisko: $lastName<br>
DATA;
echo $data;

//nowdoc
echo <<< 'DATA'
  <hr>
  Imię: $firstName<br>
  Nazwisko: $lastName<br>
DATA;

$bin = 0b1010;
echo $bin; //10
$oct = 0o10;
echo $oct; //8
$hex = 0x1A;
echo $hex; //26

 ?>
  </body>
</html>

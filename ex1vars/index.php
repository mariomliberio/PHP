<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
const BR = "<br />";

$name = "Mario ";
$surname = " Liberio";
$age = 22;
$km = 1 * 3 * 125;
$egstring = "String";
$egint = 33;
$eg = 33.345;
$egboolean = true;
$emptyint = "";


echo "$name";
echo BR;
echo "$surname";
echo BR;
echo "$age";
echo BR;
echo "$km";
echo BR;
echo "$emptyint";

$emptyint = "25";
echo BR;
echo "$emptyint";
echo BR;
echo " Bonjour  $name  comment vas tu?";
echo BR;
echo " Bonjour $surname $name, tu as $age ans.  ";
echo BR;
$sum = 3 + 4;
$multi = 5 * 20;
$division = 45 / 5;

echo "$sum";
echo BR;
echo "$multi";
echo BR;
echo "$division";
?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
    </body>
 </html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$age = 19;
$isEasy = true;
$gender = "Femme";
$magnitude = "9";
const BR = '<br />';

if($isEasy = true) {
  echo " C'est Facile!";
} else {
  echo " C'est Difficile!";
};
echo BR;
if($age >= 18) {
  echo " You are Major ";
} else {
  echo " You are Minor ";
};
if($gender == "Homme") {
  echo "and a Man.";
} else {
  echo " and a Woman.";
};
echo BR;
switch ($magnitude) {
  case 1:
    echo " Micro-séisme impossible à ressentir.";
    break;
  case 2:
    echo " Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.";
    break;
  case 3:
    echo " Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.";
    break;
  case 4:
    echo " Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.";
    break;
  case 5:
    echo " Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.";
    break;
  case 6:
    echo " Fort séisme capable d'engendrer des destructions majeures sur une large distance (180 km) autour de l'épicentre.";
    break;
  case 7:
    echo " Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.";
    break;
  case 8:
    echo " Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.";
    break;
  case 9:
    echo " Séisme capable de tout détruire sur une très vaste zone.";
    break;
  default:
    echo " There is no earthquake";
};
echo BR;
if ($gender == "Femme") {
  echo "C'est une Developpeuse!!!";
} else {
  echo "C'est un Developpeur!!!";
};
echo BR;
if ($age >= 18) {
  echo " Tu es Majeur";
} else {
  echo " Tu es Mineur";
};
echo BR;
if ($isEasy == false) {
  echo " C'est pas bon!";
} else {
  echo " C'est bon";
};
echo BR;
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

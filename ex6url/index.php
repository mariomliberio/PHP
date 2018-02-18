<?php
const BR = "<br />";
echo 'Hello ' . $_GET["nom"] . " " . $_GET["prenom"] . "!";

echo BR;
echo  'You are ' . $_GET["age"] . " years old!";

echo BR;
echo 'Date debut: ' . $_GET["dateDebut"];
echo BR;
echo 'Date fin: ' . $_GET["dateFin"];
echo BR;
echo 'Langage: ' . $_GET["langage"] . " et serveur: " . $_GET["serveur"];
echo BR;
echo 'Semaine: ' . $_GET["semaine"];
echo BR;
echo "Batiment " . $_GET["batiment"] . " et salle: " . $_GET["salle"];
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

<?php
const BR = '<br />';

function hey() {
  return true;
};

echo BR;

function repeat($abc){
echo abc;
};

echo repeat();
echo BR;

function conc($r, $b){
  echo $r.$b;
};

echo conc("rapid","fall");

echo BR;

function numb($z, $x){
  if ($z > $x) {
    echo "Le premier nombre est plus grand";
  } else if ($z < $x){
    echo "Le premier nombre est plus petit";
  } else if ($z === $x){
    echo "Les deux nombres sont identiques";
  } else {
    echo "Enter numbers pls";
  };
};

echo numb(3, 5);

echo BR;

echo conc("blabla", 5);

echo BR;

function sentence($nom, $prenom, $age){
  echo "Bonjour ", $nom ," ", $prenom , " , tu as ", $age, " ans.";
}

echo sentence("Liberio", "Mario", 22);

echo BR;

function agegender($year, $gender){
  switch()
};
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

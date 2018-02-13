
<?php
const BR = '<br />';
$x = rand(1, 100);
$fifteen = 15;
for ($i = 1; $i <=10; $i++) {
  echo $i;
};
echo BR;
for ($j = 1; $j <=20; $j++) {
  echo  $j * $x;
};
echo BR;
for ($y = 100; $y >= 10; $y--) {
  echo $y * $x;
};
echo BR;
for ($z = 1; $z < 10; $z = $z+$z/2) {
  echo $z;
};
echo BR;
for($t = 1; $t <= 15; $t++) {
  echo "On y arrive presque"; // 15 fois
};
echo BR;
for ($r = 20; $r >= 0; $r--) {
  echo "C'est presque bon."; // 21 fois
};
echo BR;
for ($d = 1; $d < 100; $d+=15) {
  echo "On tient le bon bout"; // 7 fois
};
echo BR;
for ($u = 200; $u >= 0; $u-=12) {
  echo "Enfin!!!!!!"; // 17 fois
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

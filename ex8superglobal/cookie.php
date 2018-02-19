
<?php
const BR = "<br />";
setcookie("login", $_POST["login"], time() + (86400 * 30), "/");
echo BR;
echo $_COOKIE["login"];
setcookie("pw", $_POST["pw"], time() + (86400 * 30), "/");
echo BR;
echo $_COOKIE["pw"];
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

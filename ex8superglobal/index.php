<?php
session_start();
const BR = "<br />";
echo $_SERVER['REMOTE_ADDR'];
echo BR;
echo $_SERVER['HTTP_USER_AGENT'];
echo BR;
echo $_SERVER['SERVER_NAME'];
echo BR;
$_SESSION['name'] = 'Pist';
$_SESSION['prenom'] = 'Ppist';
$_SESSION['age'] = 69;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <form class="" action="cookie.php" method="post">
      <input type="text" name="login" value="">
      <input type="text" name="pw" value="">
      <button type="submit" name="button">submit</button>
    </form>
    <form class="" action="index2.php" method="post">
      <button type="submit" name="button">Index 2</button>
    </form>
  </body>
</html>

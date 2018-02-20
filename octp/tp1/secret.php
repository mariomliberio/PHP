<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(isset($_POST["pw"])&& $_POST["pw"] == "doggo") {
    ?>
  <img src="http://i0.kym-cdn.com/entries/icons/medium/000/023/880/doggo.jpg" alt="doggo">
  <h1>SUCCESS</h1>
    <?php
  } else {
    echo "<p>Incorrect Password</p>";
  }
    ?>
  </body>
</html>

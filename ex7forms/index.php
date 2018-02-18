<?php
const BR = "<br />";
echo "Your Gender is ".$_POST["gender"];
echo BR;
echo "Your name is ".$_POST["name3"];
echo BR;
echo "Your surname is ".$_POST["surname3"];


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="user.php" method="get">
      Your name: <input type="text" name="name">
      Your surname: <input type="text" name="surname">
      <input type="submit">
    </form>
    <br>
    <form action="user.php" method="post">
      Your name (again): <input type="text" name="name2">
      Your surname (again): <input type="text" name="surname2">
      <input type="submit">
    </form>
    <br> <br> <br>
    <form  action="index.php" method="post" id="hideForm">
      Your Gender: <select  name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
      </select><br>
      Your name: <input type="text" name="name3"><br>
      Your surname: <input type="text" name="surname3"><br>
      <input type="submit" onclick="btnhide()">
    </form>
    <script type="text/javascript">
    function btnhide(){
      document.getElementById('hideForm').style.display = 'none';

    }
    </script>
  </body>
</html>

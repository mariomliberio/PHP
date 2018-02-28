<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mario To Do</title>
  <link rel="stylesheet" href="../assets/furtive.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../assets/style.css">
  <script src="../assets/jquery.min.js"></script>
</head>
<body>
  <div class="container m2">
    <div class="row txt--center bg--green">
       <h1 class="fnt--white">To Do App</h1>
    </div>
    <div class="row"><hr></div>
    <div class="row">
      <div class="col-6-sm "><h5>A faire</h5></div>
    </div>
    <div class="row">
      <div class="col-6-sm" id="todos">
        <ul id="list"> 
       
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-6-sm"><h5>Fini</h5></div>
    </div>
    <div class="row">
      <div class="col-6-sm" id="dones">
        <ul id="list">
        
        </ul>
      </div>
    </div>
    <div class="row"><hr></div>
    <div class="row">
      <?php
        include 'form.php';
      ?>
    </div>
  </div>
</body>

</html>
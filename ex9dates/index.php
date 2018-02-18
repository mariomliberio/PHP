<?php
const BR = "<br />";
$today = date("d/m/y");
echo $today;
echo BR;
$today1= date("d-m-y");
echo $today1;
$today2 = date("l, F j, Y");
echo BR;
echo $today2;
echo BR;
echo $timestampPresent = strtotime("now");
echo BR;
echo $augustPastTimestamp = strtotime("2 August 2016 15:00");
echo BR;
echo $mayPastTimestamp = strtotime("16 May 2016");
echo BR;
$formatTime ="Y-m-d\TH:i:s\Z";
$comparativeMayNow = substr_compare($timestampPresent, $mayPastTimestamp);
echo $resultComparative = gmdate($formatTime, $comparativeMayNow)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
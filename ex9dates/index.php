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
echo $comparativeMayNow = ($timestampPresent - $mayPastTimestamp) / 86400;
echo BR;
echo $daysinfeb = cal_days_in_month(CAL_GREGORIAN, 2, 2017);
echo BR;
$date = date("d-m-y");
echo date("d-m", strtotime($date. "+ 20 days" ));
echo BR;
echo date("d-m", strtotime($date."- 22 days"));
echo BR;
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
<form class="" action="index.php" method="post">
<label for="month">Month</label>
  <select class="" name="month">
    <option value="1">January</option>
    <option value="2">Febuary</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
  </select>
  <select class="" name="year">
    <label for="year">Year</label>
    <option value="2018">2018</option>
    <option value="2017">2017</option>
    <option value="2016">2016</option>
    <option value="2015">2015</option>
    <option value="2014">2014</option>
    <option value="2013">2013</option>
    <option value="2012">2012</option>
    <option value="2011">2011</option>
    <option value="2010">2010</option>
    <option value="2009">2009</option>
    <option value="2008">2008</option>
    <option value="2007">2007</option>
    <option value="2006">2006</option>
    <option value="2005">2005</option>
    <option value="2004">2004</option>
    <option value="2003">2003</option>
    <option value="2002">2002</option>
    <option value="2001">2001</option>
    <option value="2000">2000</option>
    <option value="1999">1999</option>
    <option value="1998">1998</option>
    <option value="1997">1997</option>
    <option value="1996">1996</option>
    <option value="1995">1995</option>
    <option value="1994">1994</option>
    <option value="1993">1993</option>
    <option value="1992">1992</option>
    <option value="1991">1991</option>
    <option value="1990">1990</option>

  </select>
  <button type="submit" name="button">Display Table</button>
</form>
</body>
</html>

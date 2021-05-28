<?php
require 'sambung.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body> <header>
    <?php  include 'menu1.php'; ?>
    <p><center>
      <font size ="5" face ="verdana" color = "orange"</center> <?php echo $motto2; ?> </font>
    </center>5
    </p>
  </header>

  <table width = '70%' border = 0 align="center">
    <td width = '20%'>
<img src="<?php echo $logo; ?>" alt="Error" width="100%" height="100%">
    </td>
    <td width = '50%'>
      <marquee behavior="alternate" direction="left"> SOALAN TERKINI </marquee>

      <?php include 'soalan_terkini.php' ?>
    </td>
    <tr>
    </tr>
  </table>

  <?php include 'footer.php' ?>

  </body>
</html>

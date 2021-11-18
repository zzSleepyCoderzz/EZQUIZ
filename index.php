<?php

//Fail untuk sambung ke database
require 'sambung.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $title; ?></title>

  <!-- Fail  header halaman utama -->
  <?php include 'header1.php'; ?>
</head>

<body>
  <!-- Bahagian css -->
  <style media="screen">
    body {
      background-color: #ECEBE4;
    }

    div {
      background-color: #32CD32;
    }

    p {
      font-family: "DIN Next LT Pro Light";
      font-size: 18px;
      margin-bottom: 0;
    }

    b {
      font-family: "DIN Next LT Pro Bold";
    }
  </style>

  <br>
  <br>

  <!-- Fail  header halaman utama -->
  <?php include 'menu1.php'; ?>

  <br>
  <br>
  <table width='70%' border=0 align="center">
    <td width='50%'>

      <!-- Text yang bergerak ke kiri dan kanan -->
      <marquee behavior="alternate" direction="left">
        <p>SOALAN TERKINI</p>
      </marquee>

      <!-- Memaparkan soalan terkini -->
      <?php include 'soalan_terkini.php' ?>
    </td>
  </table>
  </div>
  <br>
  <br>
  <center>
    <p style="font-family: 'Times New Roman' ; font-weight :lighter; font-size : 12px;">*REKOD HANYA 10 YANG TERAWAL*</p>
  </center>
  <center style="margin-top:50px;">
    <?php include 'footer.php' ?>
  </center>
</body>

</html>
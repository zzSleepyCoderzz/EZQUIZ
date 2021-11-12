<?php

//Fail untuk sambung ke database
include 'sambung.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" style="padding: 0;">

<head>
  <meta charset="utf-8">
  <title>EZQUIZ</title>
</head>

<body style="margin:0;" onload = "javascript:color();" >

  <!-- Bahagian css -->
  <style media="screen">
    #changecolor {
      background: linear-gradient(to bottom right, pink, blue, lightblue);
      box-shadow: none;
      width: 150px;
      height: 50px;
      border-radius: 20px;
      margin-top: 4vh;
      margin-right: 3vh;
      float: right;
      width: 90px;
      padding-left: 1vh;
      padding-right: 1vh;
      border: none;
      color: white;
      font-family: "Feather Bold";
    }

    #changecolor:hover {
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }

    #header1 {
      height: 30vh;
      background-color: #32CD32;
    }

    #logo {
      float: left;
      margin-left: 3vh;
    }
  </style>

  <center id="header1">
      <!-- Butang menukar warna-->
      <button id="changecolor" onclick="color();increment();">Warna</button>
      <br>
      <a href="index2.php"><img id="logo" src="logo.png" alt="logo" width="100px" height="60px"></a>
      <br>
      <p>
        <font size="+5" color="white" font face="Feather Bold">
          <?php echo $nama_sistem; ?>
        </font>
      </p>
      <br>
  </center>
</body>

</html>
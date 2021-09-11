<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
 ?>

 <?php
 $query = "INSERT INTO perekodan(idpengguna, idtopik, skor)
 values('$_SESSION[idpengguna]', '$_SESSION[pilih_topik]','$_SESSION[score]')";
 $insert_row = mysqli_query($hubung , $query);
 ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <style media="screen">
      body{
        background-color: #ECEBE4;
      }

      #p1{
        font-family: "Feather Bold";
        font-size: 40px;
        margin-top: 20px;
        margin-bottom: 20px;
      }

      #p2{
        font-family: "DIN Next LT Pro Bold";
        font-size: 28px;
        margin: 0;
      }

      #p3{
        font-family: "DIN Next LT Pro Light";
        font-size: 20px;
        margin:0;
      }

      #papar{
        border: none;
        color: black;
        padding: 8px 20px;
        text-align: center;
        font-family: "Feather Bold";
        display: inline-block;
        font-size: 12px;
        border-radius: 10px;
        margin: 0;
        background-color:#00ff00;
        border: 2px solid #00ff00;
      }

      #papar:hover{
        cursor: pointer;
        background-color: white;
        color: black;
        box-shadow: none;
      }

      #papar1{
        border: none;
        color: black;
        padding: 8px 20px;
        text-align: center;
        font-family: "Feather Bold";
        display: inline-block;
        font-size: 12px;
        border-radius: 10px;
        margin: 0;
        background-color:#00ff00;
        border: 2px solid #00ff00;
        background-color:red;
        border: 2px solid red;
      }

      #papar1:hover{
        cursor: pointer;
        background-color: white;
        color: black;
        box-shadow: none;
      }

      #papar2{
        border: none;
        color: black;
        padding: 8px 20px;
        text-align: center;
        font-family: "Feather Bold";
        display: inline-block;
        font-size: 12px;
        border-radius: 10px;
        margin: 0;
        background-color:#00ff00;
        border: 2px solid #00ff00;
        background-color:#F0A202;
        border: 2px solid #F0A202;
      }

      #papar2:hover{
        cursor: pointer;
        background-color: white;
        color: black;
        box-shadow: none;
      }
      </style>
      <center>
        <p id = "p1">-SOALAN TAMAT-</p>
      </center>
      <main>
        <table width = "70%" border = "0" align = "center">
          <tr align = "center">
            <td>
              <p id = "p3">Tahniah! Anda telah selesai menjawab semua soalan.</p>
              <br>
              <p id = "p3">Bilangan Betul:<div id = "p2"><?php echo $_SESSION['score']; ?>/<?php echo $_GET['jum']; ?></div></p>
            </td>
          </tr>
          <tr align = "center">
            <td>
              <br>
              <br>
              <button id = "papar" onclick="window.location.href = 'soalan_papar.php?n=1'">Cuba Lagi</button>
              <button id = "papar1" onclick="window.location.href = 'index2.php'">Tamat</button>
              <button id = "papar2" onclick="window.location.href = 'skor_individu.php'">Prestasi</button>
              <?php $_SESSION['score'] = 0; ?>
            </td>
          </tr>
        </table>
      </main>
      <center style="margin-top:170px;">
        <?php include 'footer.php'; ?>
      </center>
    </body>
  </html>

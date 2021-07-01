<?php

require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

$guru = $_SESSION['idpengguna'];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php
     include 'menu.php';
      ?>
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
       font-size: 18px;
       font-family: "DIN Next LT Pro Light";
     }

     hr{
       width : 1070px;
     }

     b{
       font-family: "DIN Next LT Pro Bold";
     }

     #papar{
       background-color: #F0A202;
       border: none;
       color: white;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border: 2px solid #F0A202;
       margin: 0;
     }

     #papar:hover{
       cursor: pointer;
       background-color: white;
       color: black;
       box-shadow: none;
     }
     </style>

     <center><p id = "p1"> PRESTASI PELAJAR BERDASARKAN SUBJEK - TOPIK</p></center>
     <br>
     <main>
       <table width = "70%" border = "0" align = "center" style="font-size:16px;font-family:DIN Next LT Pro Light;">
         <tr>
           <td width = "5%"><b> Bil. </b></td>
           <td width = "15%"><b> Subjek </b></td>
           <td width = "35%"><b> Topik </b></td>
           <td width = "8%"><b> Bil. Jawab</b></td>
           <td width = "10%"><b> Laporan Lengkap </b></td>
         </tr>
         <hr>
         <?php
          $no = 1;
          $topik = mysqli_query($hubung , "SELECT * FROM topik WHERE idpengguna = '$guru'");

          while ($infoTopik = mysqli_fetch_array($topik)) {
          $subjek = mysqli_query($hubung , "SELECT * FROM subjek
          WHERE idsubjek = '$infoTopik[idsubjek]' ");
          $infoSubjek = mysqli_fetch_array($subjek);
          $rekod = mysqli_query($hubung , "SELECT idtopik, COUNT(idtopik) as 'bil' FROm perekodan
          WHERE idtopik = '$infoTopik[idtopik]'");
          $infoJawab = mysqli_fetch_array($rekod);
         ?>

         <tr>
           <td><?php echo $no; ?></td>
           <td><?php echo $infoTopik['topik']; ?></td>
           <td><?php echo $infoSubjek['subjek']; ?></td>
           <td><?php echo $infoJawab['bil']; ?></td>
           <td>
             <a href = "laporan_guru.php?idtopik=<?php echo $infoTopik['idtopik']; ?>">
             <button id = "papar"> Papar </button>
           </td>
         </tr>
         <?php $no++; } ?>
       </table>
     </main>
     <br>
     <br>
     <center><font style = 'font-size:14px'> *Senarai Tamat* <br> Jumlah Rekod: <?php echo $no-1; ?></font></center>
   </body>
    <center style="margin-top:80px;"><?php include 'footer.php'; ?></center>
 </html>

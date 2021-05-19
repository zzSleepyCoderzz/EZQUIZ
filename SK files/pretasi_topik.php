<?php

require 'sanmbung.php';
require 'keselamatan.php';
include 'header.php';

$guru = $_SESSIION['idpengguna'];

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
     <center><h2> PRESTASI PELAJAR BERDASARKAN SUBJEK - TOPIK></h2></center>
     <main>
       <table width = "70%" border = "0" align = "center" style="font-size:16px">
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "15%"><b> Subjek </b></td>
           <td width = "35%"><b> Topik </b></td>
           <td width = "8%"><b> Bil. Jawab</b></td>
           <td width = "10%"><b> Laporan Lengkap </b></td>
         </tr>
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
          }
         ?>

         <tr>
           <td><?php echo $no; ?></td>
           <td><?php echo $infoTopik['topik']; ?></td>
           <td><?php echo $infoSubjek['subjek']; ?></td>
           <td><?php echo $infoJawab['bil']; ?></td>
           <td>
             <a href = "laporan_guru.php?idtopik = <?php echo $infoTopik['idtopik']; ?>">
             <button> Papar </button>
           </td>
         </tr>
         <?php no++; ?>
       </table>
     </main>
     <center><font style = 'font-size:14px'> *Senarai Tamat* <br> Jumlah Rekod: <?php echo $no-1; ?></font></center>
   </body>
 </html>

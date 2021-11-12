<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail header selepas log in
include 'header.php';

//Dapatkan ID Pengguna semasa
$idpengguna = $_SESSION['idpengguna'];

//Diperlukan untuk suppress ralat sekiranya skor tiada data
error_reporting(E_ERROR | E_PARSE);

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>

     <!-- Fail menu selepas log in -->
     <?php include 'menu.php'; ?>
   </head>
   <body>

     <!-- Fail menu halaman utama -->
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

     b{
       font-family: "DIN Next LT Pro Light";
     }

     hr{
       width : 1070px;
     }
     </style>

     <center>
       <p id = "p1">REKOD MARKAH YANG DICAPAI</p>
     </center>
     <br>
     <main>
       <table width = "70%" border = "0" align = "center" style="font-size:16px;font-family:DIN Next LT Pro Light;">
         <tr>
           <td Width = "5%"><b> Bil. </b></td>
           <td Width = "10%"><b> Subjek </b></td>
           <td Width = "38%"><b> Topik </b></td>
           <td Width = "14%"><b> Tarikh </b></td>
           <td Width = "5%"><b> Skor </b></td>
           <td Width = "5%"><b> Markah</b></td>
         </tr>
         <hr>
         <?php
         $no = 1;

         //Dapatkan dan paparkan rekod kuiz pengguna semasa
         $data1 = mysqli_query($hubung, "SELECT * FROM perekodan
         WHERE idpengguna = '$idpengguna' ORDER BY catatan_masa DESC
         limit 0,10");

         while ($info1 = mysqli_fetch_array($data1)) {

           $dataTopik = mysqli_query($hubung , "SELECT * FROM topik WHERE
           idtopik = '$info1[idtopik]' ");
           $getTopik = mysqli_fetch_array($dataTopik);

           $dataSoalan = mysqli_query($hubung , "SELECT COUNT(idtopik) AS
           'bil' FROM soalan WHERE idtopik = '$info1[idtopik]' ");
           $getBilSoalan = mysqli_fetch_array($dataSoalan);

           $dataSubjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE
           idsubjek = '$getTopik[idsubjek]' ");
           $getSubjek = mysqli_fetch_array($dataSubjek);

           $bilSoalan = $getBilSoalan['bil'];
           $markah_Topik = $getTopik['markah'];

          ?>
          <tr>
            <td> <?php echo $no; ?></td>
            <td> <?php echo $getSubjek['subjek']; ?></td>
            <td> <?php echo $getTopik['topik']; ?></td>
            <td> <?php echo date('d-m-Y g:i A', strtotime($info1['catatan_masa'])); ?></td>
            <td> <?php echo $info1['skor']; ?></td>
            <td> <?php echo number_format(($info1['skor']/$bilSoalan)*$markah_Topik); ?> %</td>
          </tr>
          <?php $no++; }?>
       </table>
     </main>
     <br>
     <br>
     <center>
       <font style="font-size:14px">
         *Senarai Tamat* <br>
         Jumlah Rekod: <?php echo $no-1; ?>
       </font>
     </center>
   </body>
 </html>

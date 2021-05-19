<?php
require 'sanmbung.php';
require 'keselamatan.php';
include 'header.php';

$idpengguna = $_SESSION['idpengguna'];
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'menu.php'; ?>
   </head>
   <body>
     <center>
       <h2>REKOD MARKAH YANG DICAPAI</h2>
     </center>
     <main>
       <table width = "70%" border = "0" align = "center" style="font-size:16px">
         <tr>
           <td Width = "2%"><b> Bil. </b></td>
           <td Width = "10%"><b> Subjek </b></td>
           <td Width = "38%"><b> Topik </b></td>
           <td Width = "10%"><b> Tarikh </b></td>
           <td Width = "5%"><b> Skor </b></td>
           <td Width = "5%"><b> Markah</b></td>
         </tr>
         <?php
         $no = 1;
         $data - mysqli_query($hubung, "SELECT * FROM perekodan
         WHERE idpengguna = '$idpengguna' ORDER BY catatan_masa DESC
         limit 0,10");

         while ($info1 = mysqli_fetch_array($data1)) {

           $dataTopik = mysqli_query($hubung "SELECT * FROM topik WHERE
           idtopik = '$info1[idtopik]' ");
           $getTopik = mysqli_fetch_array($dataTopik);

           $dataSoalan = mysqli_query($hubung "SELECT COUNT(idtopik) AS
           'bil' FROM soalan WHERE idtopik = '$info1[idtopik]' ");
           $getBilSoalan = mysqli_fetch_array($dataSoalan);

           $dataSubjek = mysqli_query($hubung "SELECT * FROM subjek WHERE
           idsubjek = '$getTopik[idsubjek]' ");
           $getTopik = mysqli_fetch_array($dataSubjek);

           $bilSoalan = $getBilSoalan['bil'];
           $markah_Topik = $getTopik['markah'];

         }
          ?>

          <tr style="font-size:14px">
            <td> <?php echo $no; ?></td>
            <td> <?php echo $getSubjek['subjek']; ?></td>
            <td> <?php echo $getTopik['topik']; ?></td>
            <td> <?php echo date('d-m-Y g:i A', strtotime($info1['catatan_masa'])); ?></td>
            <td> <?php echo $info1['skor']; ?></td>
            <td> <?php echo number_format(($info1['skor']/$bilSoalan)*$markah_Topik); ?> %</td>
          </tr>
          <?php $no++; ?>
       </table>
     </main>
     <center>
       <font style="font-size:14px">
         *Senarai Tamat* <br>
         Jumlah Rekod: <?php echo $no-1; ?>
       </font>
     </center>
   </body>
 </html>
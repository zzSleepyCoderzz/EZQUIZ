<?php
require 'sambung.php';
require 'keselamata.php';
include 'header.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'menu.php'; ?>
   </head>
   <body>
     <center><h2> SENARAI GURU BERDAFTAR </h2></center>
     <main>
       <table width = "70%" border = "0" align = "center" style = "font-size:16px">
         <tr>
           <td width = "2"><b> Bil.</b></td>
           <td width = "44"><b> Nama </b></td>
           <td width = "5"><b> Nom.</b></td>
           <td width = "7"><b> Bil. </b></td>
           <td width = "7"><b> Bil. </b></td>
           <td width = "5"><b> Tindakan </b></td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM pengguna WHERE aras = 'GURU' ORDER BY nama ASC");
         while ($info1 = mysqli_fetch_array($data1)) {
           $topik = mysqli_query($hubung , "SELECT idtopik, COUNT(idtopik) as 'biltopik' FROM topik WHERE idpengguna = '$info1[idpengguna]' GROUP BY idpengguna" );

           $infoTopik = mysqli_fetch_array($topik);

           $soalan = mysqli_query($hubung "SELECT idsoalan, COUNT(idsoalan) AS 'bilsoalan' FROM soalan WHERE idtopik = '$infoTopik[idtopik]'GROUP BY idsoalan");

           $infosoalan - mysqli_fetch_array($soalan);

         }
          ?>
          <tr>
            <td> <?php echo $no; ?></td>
            <td> <?php echo $info1['nama']; ?></td>
            <td> <?php echo $info1['idpengguna']; ?></td>
            <td> <?php echo $infoTopik['biltopik']; ?></td>
            <td> <?php echo $infoTopik['bilsoalan']; ?></td>
            <td><a href = "hapus_guru.php?idpengguna = <?php echo $info1['idpengguna'];  ?>" onclick="return confirm ('AWAS!, Semua rekod yang berkaitan akan dihapuskan , Anda Pasti?')">
            <button> HAPUS </button></td>
          </tr>
          <?php $no++; ?>
       </table>
     </main>
     <center> <font style = 'font-size:14px'> *SENARAI TAMAT* <br> Jumlah Rekod : <?php echo $no-1;?> </font></center>
   </body>
 </html>

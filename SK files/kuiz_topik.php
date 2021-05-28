<?php
require 'sanmbung.php';
require 'keselamatan.php';
include 'header.php';

$subjek_pilihan = $_GET['idsubjek'];

$result = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubjek = '$subjek_pilihan'");
while ($res = mysqli_fetch_array($result)) {
  $paparsubjek = $res['subjek'];
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'menu.php'; ?>
   </head>
   <body>
     <center><h2>SENARAI TOPIK UNTUK SUBJEK <?php echo $paparsubjek; ?></h2></center>
     <main>
       <table width = "70%" border = "0" align = "center" style="font=size:16px">
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "50%"><b> Topik </b></td>
           <td width = "10%"><b> Bil. Soalan </b></td>
           <td width = "10%"><b> Soalan </b></td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM topik
         WHERE idsubjek = '$subjek_pilihan'");
         while ($info1 = mysqli_fetch_array($data1)) {
           $dataBil = mysqli_query($hubung , "SELECT COUNT(idtopik) AS 'bil'
           FROM soalan WHERE idtopik = '$info1[idtopik]'");
           $getBil = mysqli_fetch_array($dataBil);
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['topik']; ?></td>
            <td><?php echo $getBil['bil']; ?></td>
            <td><a href ="soalan_mula.php?idtopik = <?php echo $info1['idsubjek']; ?>" ><button>BUKA</button></td>
          </tr>
          <?php $no++; } ?>
       </table>
     </main>
     <center>
       <font style="font-size:14px"> *Senarai Tamat* <br>
       Jumlah Rekod: <?php echo $no-1; ?>
     </font>
     </center>
   </body>
 </html>

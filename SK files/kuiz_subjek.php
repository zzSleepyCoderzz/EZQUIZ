<?php
require 'sanmbung.php';
require 'keselamatan.php';
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
     <center><h2>SENARAI SUBJEK</h2></center>
     <main>
       <table width = "70%" borde = "0" align = "center" style="font-size:16px">
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "50%"><b> Subjek </b></td>
           <td width = "5%"><b> Bil.Topik </b></td>
           <td width = "5%"><b> Tindakan </b></td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM subjek");
         while ($info1 = mysqli_fetch_array($data1)) {
           $dataBil = mysqli_query($hubung , "SELECT COUNT(idsubjek) AS
           'bil' FROM topik WHERE idsubjek = '$info1[idsubjek]'");
           $getBil = mysqli_fetch_array($dataBil);
         }
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['subjek']; ?></td>
            <td><?php echo $getBil['bil']; ?></td>
            <td><a href ="kuiz_topik.php?idsubjek = <?php echo $info1['idsubjek']; ?>" ><button>PILIH</button></td>
          </tr>
          <?php $no++; ?>
       </table>
     </main>
     <center>
       <font style="font-size:14px"> *Senarai Tamat* <br>
       Jumlah Rekod: <?php echo $no-1; ?>
     </font>
     </center>
   </body>
 </html>

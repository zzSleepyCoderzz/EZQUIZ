<?php
require 'sambung.php';
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
     <center><h2> SENARAI PELAJAR BERDAFTAR</h2></center>
     <main>
       <table width = "70%" border = "0" align = "center" style = 'font-size:16px'>
         <tr>
           <td width = "5%"><b> Bil. </b></td>
           <td width = "10%"><b> ID Pelajar </b></td>
           <td width = "5%"><b> Password </b></td>
           <td width = "50%"><b> Nama Pelajar </b></td>
           <td width = "5%"><b> Jantina </b></td>
           <td width = "5%"><b> Tindakan </b></td>
         </tr>

         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM pengguna WHERE aras = 'PELAJAR' ORDER BY nama ASC");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['idpengguna']; ?></td>
            <td><?php echo $info1['password']; ?></td>
            <td><?php echo $info1['nama']; ?></td>
            <td><?php echo $info1['jantina']; ?></td>
            <td><a href = "hapus_pelajar.php?idpengguna = <?php echo $info1['idpengguna'];  ?>" onclick="return confirm ('AWAS!, Semua rekod yang berkaitan akan dihapuskan , Anda Pasti?')">
            <button> HAPUS </button></td>
          </tr>
          <?php $no++ ; }?>
       </table>
     </main>
     <center> <font style = 'font-size:14px'> *SENARAI TAMAT* <br> Jumlah Rekod : <?php echo $no-1;?> </font> </center>
   </body>
 </html>

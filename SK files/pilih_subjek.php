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
     <center>
       <h2>SENARAI SUBJEK</h2>
     </center>
     <main>
       <table width = "70%" border = "0" align = center style="font-size:16px">
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "50%"><b> Subjek </b></td>
           <td width = "18%"><b> Pengurusan Topik</b></td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM subjek");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['subjek']; ?></td>
            <td>
              <a href = "papar_topik.php?idsoalan = <?php echo info1['idssubjek']; ?>">
              <button> PAPAR </button>
            </td>
          </tr>
          <?php $no++; } ?>
       </table>
     </main>
     <?php include 'footer.php'; ?>
   </body>
 </html>

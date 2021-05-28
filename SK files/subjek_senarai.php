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
     <center><h2>SENARAI SUBJEK BERDAFTAR</h2></center>
     <main>
       <table width = "70%" border = "0" align = "center" style = "font-size:16px">
         <tr>
           <td colspan="3" valign = "middle" align = "right">
             <b>
               <a href = "subjek_daftar.php">
                 <button>DAFTAR SUBJEK</button>
             </b>
           </td>
         </tr>
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "60%"><b> Nama Subjek </b></td>
           <td width = "8%"><b> Tindakan </b></td>
         </tr>

         <?php
         $no = 1;
         $data1 = mysqli_query($hubung, "SELECT * FROM subjek
         ORDER BY subjek ASC");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['subjek']; ?></td>
            <td align = "center">
              <a href = "hapus_subjek.php?idsubjek = <?php echo $info1['idsubjek']; ?>"
                onclick="return confirm ('Awas!!!, Topik, Soalan dan jawapan akan dihapuskan. Anda Pasti?')">
              <button> Hapus </button>5
              </a>
            </td>
          </tr>
          <?php $no++; }?>
       </table>
     </main>
     <center>
       <font style = "font-size:14px">
         *Senarai Tamat*
         <br>Jumlah Rekod : <?php echo $no-1; ?></br>
       </font>
    </center>
   </body>
 </html>

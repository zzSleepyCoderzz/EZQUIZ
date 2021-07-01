<?php
require 'sambung.php';
require 'keselamatan.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo $title; ?></title>
   </head>
   <body>
     <style media="screen">

     table {
       border-collapse: separate;
       border-spacing: 0 15px;
     }

     </style>
     <center>
     <table width = "100%" border = "0">
       <tr>
         <td width = "10%"><img src="<?php echo "$lencana"; ?>" width="100" height="102" hspace = "7" align = "left"></td>
         <td valign = "left"><h5><?php echo "$nama_sekolah"; ?></h5></td>
       </tr>
     </table>
     <table width = "100%" border = "0">
       <tr style = "font-size:16px; font-weight: 1000;">
         <td width = "5%" >Bil</td>
         <td width = "45%">Subjek</td>
         <td width = "45%">Topik</td>
         <td width = "5%">Bil.Topik</td>
       </tr>
       <br>
       <tr>
         <hr>
       </tr>
         <?php
         $no = 1;
         $rekod = mysqli_query($hubung , "SELECT * FROM topik");
         while ($infoRekod = mysqli_fetch_array($rekod)) {
           $soalan = mysqli_query($hubung, "SELECT idtopik, COUNT(idtopik) as 'bil' FROM soalan GROUP BY idtopik");
           $infoSoalan = mysqli_fetch_array($soalan);
           $subjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubjek = '$infoRekod[idsubjek]'");
           $infoSubjek = mysqli_fetch_array($subjek);
          ?>
          <tr style = "font-size:16px">
            <td width = "5%"><?php echo $no; ?></td>
            <td><?php echo $infoSubjek['subjek']; ?></td>
            <td><?php echo $infoRekod['topik']; ?></td>
            <td><?php echo $infoSoalan['bil']; ?></td>
          </tr>
          <?php $no ++; }?>
     </table>
   </center>
   <br>
   <br>
     <center> <h5> *LAPORAN TAMAT * <br> Jumlah Rekod: <?php echo $no-1; ?></h5><br>
     <a href = "index2.php"> Home</a>
     <a href = "javascript:window.print()">Cetak Laporan</a>
     <a href = "logout.php"> Log Out</a></center>

   </body>
 </html>

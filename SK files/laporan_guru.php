<?php

require 'sanmbung.php';
require 'keselamatan.php';

$topik_pilihan = $_GET['idtopik'];
$topik = mysqli_query($hubung , "SELECT * FROM topik WHERE
idtopik = '$topik_pilihan'");
$infoTopik = mysqli_fetch_array($topik);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo $nama_sistem; ?></title>
   </head>
   <body>
     <table width = "800" border ="0">
       <tr>
         <td width = "800">
           <table width = "800" border = "0">
             <tr>
               <td width = "80" valign = "top">
                 <img src = "<?php echo $lencana; ?>" width = "85" height="102" hspace = "7" align = "left">
               </td>
               <td><h5><?php echo $nama_sekolah; ?></h5></td>
             </tr>
             <tr>
               <td colspan="3" valign = "top"><hr></td>
             </tr>
           </table>
         </td>
       </tr>
       <tr>
         <td><p><strong>LAPORAN PRESTASI PELAJAR BAGI TOPIK: <?php echo $infoTopik['topik']; ?></strong></p><table width = "800" border = "0" align = "center"> </table></td>
       </tr>
       <tr>
         <td width = "10"><b> Bil. </b></td>
         <td width = "550"><b> Nama Pelajar </b></td>
         <td width = "150"><b> Skor Tertinggi </b></td>
         <td width = "90"><b> Bil. </b></td>
       </tr>
       <?php
       $no =1 ;

       $rekod = mysqli_query($hubung , "SELECT idpengguna, idtopik, MAX(skor), COUNT(idpengguna) as 'Bil' FROM perekodan WHERE
       idtopik = '$topik_pilihan' GROUP BY idpengguna HAVING MAX(skor) >= 0");
       while ($infoRekod = mysqli_fetch_array($rekod)) {

         $pelajar = mysqli_query($hubung, "SELECT * FROM pengguna WHERE idpengguna = '$infoRekod[idpengguna]'");
         $infoPelajar = mysqli_fetch_array($pelajar);
       }
        ?>
        <tr style="font-size:16px">
          <td> <?php echo $no; ?></td>
          <td> <?php echo $infoPelajar['nama']; ?></td>
          <td> <?php echo $infoRekod['Max(skor)']; ?></td>
          <td> <?php echo $infoRekod['Bil']; ?></td>
        </tr>
        <?php $no++: ?>
     </table>
     <center>
       <h5>*LAPORAN TAMAT* <br>
         Jumlah Rekod : <?php echo $no; ?></h5><br>
         <a href ="index.php"> Home </a>
         <a href ="javascript:window.print()" > Cetak Laporan </a>
         <a href = "logout.php"> Logout </a>
     </center>
   </body>
 </html>

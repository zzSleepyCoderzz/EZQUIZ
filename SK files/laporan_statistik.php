<?php
require 'sambung.php';
require 'keselamatan.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo "$nama_sistem"; ?></title>
   </head>
   <body>

     <table width = "800" border = "0">
       <tr>
         <td width = "800">
           <table width = "800" border = "0">
             <tr>
               <td width = "80" valign = "top">
                 <img src="<?php echo "$lencana"; ?>" width="85" height="102" hspace = "7" align = "left">
               </td>
               <td><h5><?php echo "$nama_sekolah"; ?></h5></td>
             </tr>
             <tr>
               <td colspan="3" valign = "top"><hr></td>
             </tr>
            </table>
           </td>
         </tr>
         <?php
         $no = 1;
         $rekod = mysqli_query($hubung , "SELECT * FROM topik");
         while ($infoRekod = mysqli_fetch_array($rekod)) {
           $soalan = mysqli_query($hubung, "SELECT idtopik, COUNT(idtopik) AS 'bil' FROM soalan GROUP BY idtopik");
           $infoSoalan = mysqli_fetch_array($soalan);
           $subjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubejek = '$infoRekod[idsubjek]'");
           $infoSubjek = mysqli_fetch_array($subjek);
         }
          ?>
          <tr style = "font-size:16px">
            <td><?php echo $no; ?></td>
            <td><?php echo $infoSubjek['subjek']; ?></td>
            <td><?php echo $infoRekod['topik']; ?></td>
            <td><?php echo $infoSoalan['bil']; ?></td>
          </tr>
          <?php $no ++ ?>
     </table>
     <center> <h5> *LAPORAN TAMAT * <br> Jumlah Rekod: <?php echo "no-1"; ?></h5><br>
     <a href = "index2.php"> Home</a>
     <a href = "javascript:window.print()">Cetak Laporan</a>
     <a href = "logout.php"> Home</a> Logout </center>

   </body>
 </html>

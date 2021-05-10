<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
$nokp = $_SESSION['idpengguna'];

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <?php include 'menu.php'; ?>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <center>
       <h2><?php echo $pengguna; ?></h2>
     </center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td>
             <center>
             <h3>
             <b> * SELAMAT DATANG *</b>
             </h3>
             <p>
               <?php
               $dataA = mysqli_query($hubung , "SELECT * FROM pengguna WHERE idpengguna = '$nokp'");
               $infoA = mysqli_fetch_array($dataA);
                ?>
                <?php echo $infoA['nama']; ?> <br>
                <?php echo $infoA['idpengguna']; ?> <br>
             </p>
            </center>
           </td>
         </tr>
       </table>
     </main>

     <?php include 'footer.php'; ?>

   </body>
 </html>

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
     <style media="screen">

       body{
         background-color: #ECEBE4;
       }

       #p1{
         font-family: "Feather Bold";
         font-size: 40px;
         margin-top: 20px;
         margin-bottom: 20px;
       }

       #p2{
         font-size: 18px;
         font-family: "DIN Next LT Pro Light";
       }

     </style>

     <center>
       <p id = "p1"><?php echo $pengguna; ?></p>
     </center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td>
             <center>
               <?php
               $dataA = mysqli_query($hubung , "SELECT * FROM pengguna WHERE idpengguna = '$nokp'");
               $infoA = mysqli_fetch_array($dataA);
                ?>
               <p id = "p2"> SELAMAT DATANG, <?php echo $infoA['nama'];?>.</p>
               <p id = "p2">Nombor KP anda ialah <?php echo $infoA['idpengguna']; ?>.</p>
            </center>
           </td>
         </tr>
       </table>
     </main>
     <center style="margin-top:150px;"><?php include 'footer.php'; ?></center>
   </body>
 </html>

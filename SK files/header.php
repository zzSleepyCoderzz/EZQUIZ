<?php
include 'sambung.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title><?php echo $nama_sistem; ?></title>
   </head>
   <body>
     <center>
       <table width = "70%" border="0" cellpadding = "0" cellspacing = "0">
         <tr>
           <td width = "70%" height = "200" background = "header.jpg" valign = "center" style="background-repeat:no-repeat;">
           </center>
           <center>
             <font size = "+3" color = "orange" font face = "Arial">
               <?php echo $nama_sistem; ?>
             </font>
             <br>
             <font size = "+1" color = "blue" font face = "Arial">
               <?php echo $motto1; ?>
             </font>
           </center>
           </td>
         </tr>
       </table>
       <?php include 'utility.php'; ?>
    </body>
 </html>

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

     b{
       font-family: "DIN Next LT Pro Light";
     }

     hr{
       width : 1070px;
     }

     #pilih{
       background-color: #ffba08;
       border: none;
       color: black;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border-color: white;
       border: 2px solid black;
       box-shadow: none;
     }

     #pilih:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }
     </style>

     <center><p id = "p1">SENARAI SUBJEK</p></center>
     <br>
     <main>
       <table style="font-family: DIN Next LT Pro Light;"width = "70%" border = "0" align = "center" style="font-size:16px">
         <tr>
           <td width = "5%"><b> Bil. </b></td>
           <td width = "50%"><b> Subjek </b></td>
           <td width = "5%"><b> Bil.Topik </b></td>
           <td width = "5%"><b> Tindakan </b></td>
         </tr>
         <hr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM subjek");
         while ($info1 = mysqli_fetch_array($data1)) {
           $dataBil = mysqli_query($hubung , "SELECT COUNT(idsubjek) AS
           'bil' FROM topik WHERE idsubjek = '$info1[idsubjek]'");
           $getBil = mysqli_fetch_array($dataBil);
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['subjek']; ?></td>
            <td><?php echo $getBil['bil']; ?></td>
            <td><a href ="kuiz_topik.php?idsubjek=<?php echo $info1['idsubjek']; ?>" ><button id = "pilih">PILIH</button></td>
          </tr>
          <?php $no++; } ?>
       </table>
     </main>
     <br>
     <br>
     <center>
       <font style="font-size:14px"> *Senarai Tamat* <br>
       Jumlah Rekod: <?php echo $no-1; ?>
     </font>
     </center>
   </body>
 </html>

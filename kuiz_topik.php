<?php

//Fail untuk sambung ke database
require 'sambung.php';
require 'keselamatan.php';

//Fail header selepas log in
include 'header.php';

//Dapatkan subjek yang dipilih di halamn sebelum ini
$subjek_pilihan = $_GET['idsubjek'];

//Dapatkan semua rekod subjek
$result = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubjek = '$subjek_pilihan'");
while ($res = mysqli_fetch_array($result)) {
  $paparsubjek = $res['subjek'];
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>

     <!-- Fail  menu selepas log in -->
     <?php include 'menu.php'; ?>
   </head>
   <body>

     <!-- Bahagian css -->
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
       width : 1065px;
     }

     #buka{
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

     #buka:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }
     </style>
     <center><p id = "p1">SENARAI TOPIK UNTUK SUBJEK : <?php echo $paparsubjek; ?></h2></center>
     <main>
       <table style="font-family: DIN Next LT Pro Light;" width = "70%" border = "0" align = "center" style="font-size:16px">
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "50%"><b> Topik </b></td>
           <td width = "10%"><b> Bil. Soalan </b></td>
           <td width = "10%"><b> Soalan </b></td>
         </tr>
         <hr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM topik
         WHERE idsubjek = '$subjek_pilihan'");

         //Dapatkan dan paparkan semua topik kuiz yang tersedia
         while ($info1 = mysqli_fetch_array($data1)) {
           $dataBil = mysqli_query($hubung , "SELECT COUNT(idtopik) AS 'bil'
           FROM soalan WHERE idtopik = '$info1[idtopik]'");
           $getBil = mysqli_fetch_array($dataBil);
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['topik']; ?></td>
            <td><?php echo $getBil['bil']; ?></td>
            <td><a href ="soalan_mula.php?idtopik=<?php echo $info1['idtopik']; ?>" ><button id = "buka">BUKA</button></td>
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
     <center style="margin-top:120px;">
       <?php include 'footer.php'; ?>
     </center>
   </body>
 </html>

<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilih_topik'] = $topik_pilihan;

$dataTopik = mysqli_query($hubung , "SELECT * FROM topik WHERE
idtopik=$topik_pilihan");
$getTopik = mysqli_fetch_array($dataTopik);

$dataSoalan = mysqli_query($hubung , "SELECT * FROM soalan WHERE
idtopik=$getTopik[idtopik]");
$getSoalan = mysqli_fetch_array($dataSoalan);

$dataSubjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE
idsubjek = $getTopik[idsubjek]");
$getSubjek = mysqli_fetch_array($dataSubjek);

$total = mysqli_num_rows($dataSoalan);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
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
       font-family: "DIN Next LT Pro Bold";
       font-size: 28px;
     }

     #cipta{
       background-color: #00ff00;
       border: none;
       color: black;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border: 2px solid #00ff00;
       margin-right: 5px;
       height: 40px;
     }

     #cipta:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }

     #cipta1{
       background-color: red;
       border: none;
       color: black;
       padding: 8px 10px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border: 2px solid red;
       box-shadow: none;
       margin-left: 5px;
       height: 40px;
     }

     #cipta1:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }
     </style>
     <center>
       <p id = "p1">Subjek: <?php echo $getSubjek['subjek']; ?></p>
       <p id = "p2"> Topik : <?php echo $getTopik['topik']; ?></p>
     </center>
     <main>
       <center>
       <table width = "30%" border = "0" align = "center">
         <tr>
           <td width = "10%" border = "0" align = "center"><h3>Arahan kepada Pelajar:</h3></td>
         </tr>
         <tr width = "10%" border = "0" align = "center">
           <td>Jawab semua soalan. Pilih jawapan yang paling sesuai.</td>
         </tr>
         <tr width = "10%" border = "0" align = "left">
           <td>
             <ul style="margin-left:30px;">
               <li>Jumlah Soalan: <strong> <?php echo $total; ?> </strong></li>
               <li>Jenis Soalan: <strong> Berbilang Jawapan</strong></li>
               <li>Peruntukan Masa: <strong> <?php echo $total*0.5; ?> minit</strong></li>
             </ul>
             <br>
             <br>
             <center>
               <a href = "soalan_papar.php?n=1&idtopik= <?php echo $topik_pilihan; ?>&total=<?php echo $total; ?>">
               <button id = "cipta">MULAKAN</button>
               <a href = "javascript: history.back()">
               <button id = "cipta1">BATALKAN</button>
             </center>
           </td>
         </tr>
       </table>
     </center>
     </main>
     <center style="margin-top:80px;">
       <?php include 'footer.php'; ?>
     </center>
   </body>
 </html>

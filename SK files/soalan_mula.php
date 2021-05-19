<?php
require 'sanmbung.php';
require 'keselamatan.php';
include 'header.php';

$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilih_topik'] = $topik_pilihan;

$dataTopik = mysqli_query($hubung , "SELECT * FROM topik WHERE
idtopik = $topik_pilihan");
$getTopik = mysqli_fetch_array($dataTopik);

$dataSoalan = mysqli_query($hubung , "SELECT * FROM soalan WHERE
idtopik = $get_Topik[idtopik]");
$getSoalan = mysqli_fetch_array($dataSoalan);

$dataSubjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE
idsubjek = $get_Topik[idsubjek]");
$getTopik = mysqli_fetch_array($dataSubjek);

$total = mysqli_fetch_array($dataSoalan);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <center>
       <h2>Subjek: <?php echo $getSubjek['subjek']; ?></h2>
       <h3>Subjek: <?php echo $gettopik['topik']; ?></h3>
     </center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td><h3>Arahan kepada Pelajar:</h3></td>
         </tr>
         <tr>
           <td>Jawab semua soalan. Pilih jawapan yang paling sesuai.</td>
         </tr>
         <tr>
           <td>
             <ul>
               <li>Jumlah Soalan: <strong> <?php echo $total; ?> </strong></li>
               <li>Jenis Soalan: <strong> Berbilang Jawapan </Strong> ?></li>
               <li>Peruntukan Masa: <strong> <?php echo $total*0.5; ?> minit</strong></li>
             </ul>
             <br>
             <a href = "soalan_papar.php?n=1&idtopik
             = <?php echo $topik_pilihan; ?>&total
             = <?php echo $total; ?>">
             <button>MULAKAN</button>
             <a href = "javascript: history.go(-1)">
             <button>BATALKAN</button>
           </td>
         </tr>
       </table>
     </main>
     <?php include 'footer.php'; ?>
   </body>
 </html>

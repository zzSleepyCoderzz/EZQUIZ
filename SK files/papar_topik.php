<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

$subjek_pilihan = $_GET['idsubjek'];
$guru = $_SESSION['idpengguna'];

$result = mysqli_query($hubung , "SELECT *FROM subjek WHERE idsubjek = '$subjek_pilihan'");

while ($res = mysqli_fetch_array($result)) {
  $subjek = $res['subjek'];
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>

     <?php include 'menu.php'; ?>

   </head>
   <body>

     <center><h2>SENARAI TOPIK SUBJEK : <?php echo $subjek; ?></h2></center>
     <main>
       <table width = "70%" border = "0" align = "center" style="font-size:18px">
         <tr>
           <td colspan="4" valign = "middle" align = "right">
           <b> <a href="tambah_topik.php?idsubjek= <?php echo $subjek_pilihan; ?>"> <button>Cipta Topik</button></td>
         </tr>
         <tr>
           <td width = "2%"><b> Bil. </td>
           <td width = "40%"><b> TOPIK </td>
           <td width = "14%"><b> Pengurusan Soalan</td>
           <td width = "14%"><b> Pengurusan Topik</td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM pengguna WHERE aras = ''PELAJAR' ORDER BY nama ASC");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['topik']; ?></td>
            <td>
              <a href="tambah_soalan.php?idtopik = <?php echo $info1['idtopik']; ?>"><button>Tambah</button>
              <a href="papar_soalan.php?idtopik = <?php echo $info1['idtopik']; ?>"><button>Papar</button>
            </td>
            <td>
              <a href="edit_topik.php?idtopik = <?php echo $info1['idtopik']; ?>"><button>Edit</button>
              <a href="hapus.php?idtopik = <?php echo $info1['idtopik']; ?>"><button>Hapus</button>
            </td>
          </tr>
          <?php $no++; }?>
       </table>
     </main>
     <br>
     <center><font style="font-size:14px"> *Senarai Tamat* <br> Jumlah Rekod: <?php echo $no-1; ?> </font></center>
   </body>
 </html>

<?php require 'sambung.php'; ?>
<hr>
<table width = "100%" border = "0" align = "center">
  <tr style="font-size:14px">
    <td width = "3%"><b>Bil.</b></td>
    <td width = "30%"><b>Subjek.</b></td>
    <td width = "57%"><b>Topik.</b></td>
    <td width = "10%"><b>Bil..</b></td>
  </tr>

  <?php
  $no = 1;
  $topik5 = mysqli_query($hubung, "SELECT * FROM topik ORDER BY idtopik desc limit 0,10");
  while( $infoTopik = mysqli_fetch_array($topik)){
    $soalan = mysqli_query($hubung , "SELECT COUNT (idtopik)) AS
    'bil' FROM soalan WHERE idtopik = '$infoTopik[idtopik]' ");
    $infoSoalan = mysqli_fetch_array($soalan);
    $subjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubjek = 'infoTopik[idsubjek]' ");
    $infoSubjek = mysqli_fetch_array($subjek);
  }
   ?>

   <tr style="font-size:14px">
     <td><?php echo $no; ?></td>
     <td><?php echo $infoSubjek['subjek']; ?></td>
     <td><?php echo $infoTopik['topik']; ?></td>
     <td><?php echo $infoSoalan['bil']; ?></td>
   </tr>
   <?php $no++; ?>

</table>
<center>
<font style = 'font-size:14px'>
  *Rekod yang dipaparkan adalah 10 yang terkini sahaja
  *<br>Jumlah Rekod: <?php echo $no-1; ?>
</font>
</center>

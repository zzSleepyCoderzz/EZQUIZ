<?php require 'sambung.php'; ?>

<hr>
<style media="screen">
  td{
    font-family: "DIN Next LT Pro Light";
  }
</style>
<table width = "100%" border = "0" align = "center" >
  <tr style="font-size:16px">
    <td width = "5%"><b>Bil.</b></td>
    <td width = "30%"><b>Subjek.</b></td>
    <td width = "57%"><b>Topik.</b></td>
    <td width = "10%"><b>Bil.Soalan</b></td>
  </tr>
  <?php
  $no = 1;
  $topik = mysqli_query($hubung, "SELECT * FROM topik ORDER BY idtopik desc limit 0,10");
  while( $infoTopik = mysqli_fetch_array($topik)){
    $soalan = mysqli_query($hubung , "SELECT COUNT(idtopik) AS 'bil' FROM soalan  WHERE idtopik = '$infoTopik[idtopik]' ");
    $infoSoalan = mysqli_fetch_array($soalan);
    $subjek = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubjek = '$infoTopik[idsubjek]' ");
    $infoSubjek = mysqli_fetch_array($subjek);
   ?>

   <tr style="font-size:16px">
     <td><?php echo $no; ?></td>
     <td><?php echo $infoSubjek['subjek']; ?></td>
     <td><?php echo $infoTopik['topik']; ?></td>
     <td><?php echo $infoSoalan['bil'];?> </td>
   </tr>
   <?php $no++; }?>
</table>

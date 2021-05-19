<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';
 ?>

 <?php
if(isset($_POST['update'])){
  $idsubjek = $_POST['idsubjek'];
  $idtopik = $_POST['idtopik'];
  $topikBaru = $_POST['paparan_topik'];
  $markahBaru = $_POST['markah'];

  $result = mysqli_query($hubung , "UPDATE topik SET topik = '$topikBaru',
  markah = '$markahBaru', idsubjek = '$idsubjek' WHERE idtopik = '$idtopik'");

  echo "<script>alert('Kenaskini rekod telah berjaya');
  window.location = 'pilih_subjek.php' </script>";
}
  ?>

  <?php

$topikEdit = $_GET['idtopik'];
$pilihTopik = mysqli_query($hubung , "SELECT FROM topik WHERE idtopik = '$topikEdit'");
while ($dataTopik = mysqli_fetch_array($pilihTopik)) {
  $pilihSubjek = mqsqli_query($hubung, " SELECT * FROM subjek WHERE
  idsubjek =$dataTopik['idsubjek']");
  $dataSubjek = mysqli_fetch_array($pilihSubjek);

  $idTOPIK = $topikEdit;
  $editTOPIK = $dataTopik['topik'];
  $editMARKAH = $dataTopik['markah'];
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
       <center><h2>KEMASKINI TOPIK</h2></center>
       <main>
         <table width = "70%" border="0" align = "center" style="font-size:18px">
           <tr>
             <td>
               <form action="edit_topik.php" method="post">
                 <p>
                   <label> Subjek: </label>
                   <select name="idsubjek">
                     <option selected value="
                     <?php echo $dataTopik['idsubjek']; ?>
                     <?php echo $dataSubjek['subjek']; ?>"></option>
                     <?php $data2 = mysqli_query($hubung , "SELECT * FROM subjek");
                       while ($info2 = mysqli_fetch_array($data2)) {
                         echo "<option value = '$info2[idsubjek]'>$info2[subjek]</option>";
                       }
                     ?>
                   </select>
                 </p>
                 <p>
                   <label>Topik :</label>
                   <input type="text" name="paparan_topik" size = "60%" value="<?php echo $editTOPIK; ?>">
                 </p>
                 <p>
                   <label>Markah :</label>
                   <input type="text" name="markah" size = "5%" value="<?php echo $editMARKAH; ?>">
                 </p>
                 <p>
                   <input type="hidden" name="idtopik" value="<?php echo $idTOPIK; ?>">
                   <input type="submit" name="update" value="KEMASKINI">
                   <input type="button" name="BATAL" onclick="history.back()">
                 </p>
               </form>
             </td>
           </tr>
         </table>
       </main>
       <?php include 'footer.php'; ?>
     </body>
   </html>

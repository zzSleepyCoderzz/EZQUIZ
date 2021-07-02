<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';

$topik_pilihan = $_GET['idtopik'];
$_SESSION['pilihan'] = $topik_pilihan;

$result = mysqli_query($hubung, "SELECT * FROM topik WHERE idtopik = '$topik_pilihan'");
while ($res = mysqli_fetch_array($result)) {
  $papartopik = $res['topik'];
  $paparmarkah = $res['markah'];
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

     hr{
       width : 1070px;
     }

     b{
       font-family: "DIN Next LT Pro Bold";
     }

     #papar{
       background-color: #F0A202;
       border: none;
       color: white;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border: 2px solid #F0A202;
       margin: 0;
     }

     #papar:hover{
       cursor: pointer;
       background-color: white;
       color: black;
       box-shadow: none;
     }

     #hapus{
       background-color: red;
       border: none;
       color: white;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border: 2px solid red;
      margin-left: 10px;
     }

     #hapus:hover{
       cursor: pointer;
       background-color: white;
       color: black;
       box-shadow: none;
     }

     </style>
     <center>
       <p id = "p1">SENARAI SOALAN BAGI TOPIK: <?php echo $papartopik; ?></p>
       <h3> MARKAH: <?php echo $paparmarkah; ?></h3>
       <br>
     </center>
     <hr>
     <main>
       <table width = "70%" border = "0" align = "center" style = "font-size:16px;font-family:DIN Next LT Pro Light;">
         <tr>
           <td width = "2%"><b> Bil. </b></td>
           <td width = "40%"><b> Soalan </b></td>
           <td width = "10%"><b> Jawapan </b></td>
           <td width = "15%"><b> Tindakan </b></td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM soalan  AS q INNER JOIN pilihan AS a ON
         q.idsoalan = a.idsoalan WHERE q.idtopik=$topik_pilihan AND a.jawapan=1 GROUP BY a.idsoalan
         ORDER BY q.idsoalan ASC");

         while ($info1 = mysqli_fetch_array($data1)) {
          ?>

          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['soalan']; ?></td>
            <td><?php echo $info1['pilihan_jawapan']; ?></td>
            <td>
              <a href = "edit_soalan.php?idsoalan=<?php echo $info1['idsoalan']; ?>">
              <button id = "papar"> EDIT </button>
              <a href = "hapus_soalan.php?idsoalan=<?php echo $info1['idsoalan']; ?>"  onclick = "return confirm('Awas! Semua rekod yang berkaitan akan dihapuskan, Anda Pasti?')">
              <button id = "hapus"> HAPUS </button>
            </td>
          </tr>
          <?php $no++; }?>
       </table>
     </main>
     <br>
     <br>
     <center><font style="font-size:14px"> *SENARAI TAMAT* <br>Jumlah Rekod: <?php echo $no-1; ?></font></center>
   </body>
    <center style="margin-top:50px;"><?php include 'footer.php'; ?></center>
 </html>

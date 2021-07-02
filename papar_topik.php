<?php
require 'sambung.php';
require 'keselamatan.php';
include 'header.php';


$subjek_pilihan = $_GET['idsubjek'];
$guru = $_SESSION['idpengguna'];

$result = mysqli_query($hubung , "SELECT * FROM subjek WHERE idsubjek = '$subjek_pilihan'");

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

     #button1{
       background-color: #3C91E6;
       border: none;
       color: white;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border: 2px solid #3C91E6;
       margin: 0;
       box-shadow: none;
       margin-left: 70px;
     }

     #button1:hover{
       cursor: pointer;
       background-color: white;
       color: black;
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

     #div1{
       margin-left: 155px;
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
       margin: 0;
     }

     #hapus:hover{
       cursor: pointer;
       background-color: white;
       color: black;
       box-shadow: none;
     }

     </style>
     <center><p id = "p1">SENARAI TOPIK SUBJEK : <?php echo $_GET['subjek']; ?></p></center>
     <div id = "div1">
       <a href="tambah_topik.php?idsubjek=<?php echo $subjek_pilihan; ?>"> <button id = "button1">Cipta Topik</button></a>
     </div>
     <br>
     <hr>
     <main>
       <table width = "70%" border = "0" align = "center" style="font-size:16px;font-family:DIN Next LT Pro Light;">
         <tr>
           <td width = "2%"><b> Bil. </td>
           <td width = "40%"><b> Topik </td>
           <td width = "15%"><b> Pengurusan Soalan </td>
           <td width = "15%"><b> Pengurusan Topik </td>
         </tr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM topik WHERE idsubjek  = '$subjek_pilihan' AND idpengguna = '$guru' ");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['topik']; ?></td>
            <td>
              <a href = "tambah_soalan.php?topik=<?php echo $info1['topik'];?>&idtopik=<?php echo $info1['idtopik']; ?>" >
                <button id = "papar" style="margin-bottom: 5px;margin-top:5px;">Tambah</button>
              </a>
              <br>
              <a href = "papar_soalan.php?idtopik=<?php echo $info1['idtopik']; ?>" >
                <button id = "papar">Papar</button>
              </a>
            </td>
            <td>
              <a href="edit_topik.php?idtopik=<?php echo $info1['idtopik']; ?>">
                <button id = "papar" style="margin-bottom: 5px;">Edit</button>
              </a>
              <br>
              <a href="hapus_topik.php?idtopik=<?php echo $info1['idtopik']; ?>">
                <button id = "hapus" >Hapus</button>
              </a>
            </td>
          </tr>
          <?php $no++; }?>
       </table>
     </main>
     <br>
     <br>
     <center><font style="font-size:14px"> *Senarai Tamat* <br> Jumlah Rekod: <?php echo $no-1; ?> </font></center>
   </body>
   <br>
   <br>
   <?php include 'footer.php'; ?>
 </html>

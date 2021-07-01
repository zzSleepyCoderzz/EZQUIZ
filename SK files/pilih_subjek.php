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

     #p2{
       font-size: 18px;
       font-family: "DIN Next LT Pro Light";
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

     hr{
       width : 920px;
     }

     b{
       font-family: "DIN Next LT Pro Bold";
     }

     </style>
     <center>
       <p id = "p1">SENARAI SUBJEK</p>
     </center>
     <br>
     <main>
       <table width = "60%" border = "0" align = center style="font-size:16px;font-family:DIN Next LT Pro Light;">
         <tr>
           <td width = "5%"><b> Bil. </b></td>
           <td width = "50%"><b> Subjek </b></td>
           <td width = "10%"><b> Pengurusan Topik</b></td>
         </tr>
         <hr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM subjek");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['subjek']; ?></td>
            <td align = "left">
              <a href = "papar_topik.php?idsubjek=<?php echo $info1['idsubjek']; ?>&subjek=<?php echo $info1['subjek']; ?>"><button id = "papar">PAPAR</button></a>
            </td>
          </tr>
          <?php $no++; } ?>
       </table>
     </main>
      <center style="margin-top:150px;"><?php include 'footer.php'; ?></center>
   </body>
 </html>

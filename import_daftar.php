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
       font-size: 16px;
       font-family: "DIN Next LT Pro Light";
       margin: 0;
     }

     hr{
       width : 1070px;
     }

     b{
       font-family: "DIN Next LT Pro Bold";
     }

     #upload{
       background-color: black;
       border: none;
       color: white;
       padding: 8px 20px;
       text-align: center;
       font-family: "Feather Bold";
       display: inline-block;
       font-size: 12px;
       border-radius: 10px;
       border-color: white;
       border: 2px solid black;
       box-shadow: none;
       margin-right: 10px;
     }

     #upload:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }

     input{
       font-family: "DIN Next LT Pro Light";
     }

     input:hover{
       cursor: pointer;
     }

     </style>

     <center><p id = "p1">IMPORT NAMA PELAJAR DARI FAIL</p></center>
     <br>
     <main>
       <table width = "46%" border = "0" align = "center">
         <tr>
           <td>
             <p id = "p2">Kemudahan untuk daftar nama pelajar secara berkelompok.</p>
             <p id = "p2">Pilih lokasi fail CSV/Excel :</p>
             <br>
             <form action="import_csv.php" method="post" nama = "upload_excel" enctype="multipart/form-data">
              <input type="file" name="file" id= "file" class = "input-large"></input>
              <br>
              <br>
              <button id = "upload" type="submit" id = "submit" name="import">Upload</button>
             </form>
             <br>
             <br>
             <p id = "p2">*Cipta fail dalam MS EXCEL dan save as .csv mengikut aturan lajur di bawah: </p>
             <table width = "100%" border="1" align = "center">
               <tr>
                 <td>111213031234</td>
                 <td>1234</td>
                 <td>SITI NORHALIZA BINTI SAMAD</td>
                 <td>PEREMPUAN</td>
               </tr>
             </table>
           </td>
         </tr>
       </table>
     </main>
      <center style="margin-top:20px;"><?php include 'footer.php'; ?></center>
   </body>
 </html>

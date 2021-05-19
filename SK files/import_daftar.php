<?php
require 'sanmbung.php';
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
     <center><h2>IMPORT NAMA PELAJAR DARI FAIL</h2></center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td>
             <label>Kemudahan untuk daftar nama pelajar secara berkelompok</label><br>
             <label>Pilih lokasi fail CSV/Excel :</label>

             <form action="import_csv.php" method="post" nama = "upload_excel" enctype="multipart/form-data">
              <input type="file" name="file" id ="file" class ="input-large"><br>
              <button type="submit" id = "submit" name="import">Upload</button>
             </form>
             <br>*Cipta fail dalam MS EXCEL dan save as .csv mengikut aturan lajur di bawah:<br>
             <table width = "70%" border="1" align = "center">
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
     <?php include 'footer.php'; ?>
   </body>
 </html>

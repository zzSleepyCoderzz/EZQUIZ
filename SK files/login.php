<?php
require 'sambung.php';
include 'header.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <?php include 'menu1.php'; ?>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <center>
       <h2>LOG MASUK PENGGUNA</h2>
     </center>
     <main>
       <table width = "70%" border = "0" align = "center">
         <tr>
           <td align = "center">
             <form action="proseslogin.php" method="post">
               NOMBOR KAD PENGENALAN : <br>
               <input onblur="checklength(this)" type="text" name="idpengguna"
               placeholder="Tanpa Tanda -" maxlength="12" size="25" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required autofocus>


             <script type="text/javascript">
               function checklength(el) {
                 if(el.value.length != 12){
                   alert("Nombor KP mesti 12 digit")
                 }
               }
             </script>
             <br>
             <input type="password" name="password" placeholder="4 Digits" maxlength="4" size="10"
             onkeypress="return event.charCode>= 48 && event.charCode <=57" required>
             <br>
             <button type="submit">DAFTAR MASUK</button>
             <button type="reset" >RESET</button>
             <br>
             <h5>*Jika belum emndaftar, <a href="daftar_baru.php"> Daftar di sini.</h5>
             <br>
            </form>
           </td>
         </tr>
       </table>
     </main>
     <?php include 'footer.php'; ?>

   </body>
 </html>

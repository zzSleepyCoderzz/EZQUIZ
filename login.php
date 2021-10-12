<?php
require 'sambung.php';
include 'header1.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <br>
     <br>
     <?php include 'menu1.php'; ?>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <style media="screen">
     body{
       background-color: #ECEBE4;
     }

     p{
       font-family: "DIN Next LT Pro Light";
       font-size: 25px;
       margin : 0;
       padding-right: 30px;
     }

     #p1{
       font-family: "Feather Bold";
       font-size: 40px;
     }

     #div1{
       background-color: #ECEBE4;
       justify-content: space-between;
       display: flex;
       width: 16%;
     }

     #div2{
       padding-left: 300px;
     }


     #new1{
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
     }

     #new1:hover{
       cursor: pointer;
       background-color: white;
       color: black;
     }

     #inputkp{
       background-color: #ECEBE4;
       border:0;
       border-bottom:  2px solid grey;
       border-radius: 2px;
       height: 30px;
       background-image: url("id.png");
       background-repeat: no-repeat;
       background-size: 30px;
       padding-left: 30px;
     }
     #inputkp:focus{
       outline: none !important;
       border: 0;
       border-bottom: 3px solid #555;
       border-radius: 3px;
       height: 30px;
     }

     #inputpin{
       background-color: #ECEBE4;
       border:0;
       border-bottom:  2px solid grey;
       border-radius: 2px;
       height: 30px;
       background-image: url("pin.png");
       background-repeat: no-repeat;
       background-size: 30px;
       padding-left: 30px;
     }
     #inputpin:focus{
       outline: none !important;
       border: 0;
       border-bottom: 3px solid #555;
       border-radius: 3px;
       height: 30px;
     }

     h5{
       padding-right: 20px;
     }


     </style>
       <center style="margin-left:30px;margin-top:30px;">
           <p id = "p1">LOG MASUK PENGGUNA</p>
       </center>
       <br>
       <br>
      <center>
       <table width = "100%" border = "0" align = "center">
         <tr>
           <td align = "center">
             <form action="proseslogin.php" method="post">
               <div id = "div2">
                 <p>No K.P.</p>
               </div>
               <div id = "div2">
                 <p><input id = "inputkp" onblur="checklength(this)" type="text" name="idpengguna"
                 placeholder ="Tanpa tanda -" maxlength="12" size="30" onkeypress="return event.charCode >= 48 && event.charCode <= 57" ></p>
               </div>

             <script type="text/javascript">
               function checklength(el) {
                 if(el.value.length != 12){
                   alert("Nombor KP mesti 12 digit")
                 }
               }
             </script>
             <br>
             <br>

             <div id = "div2">
               <p>Kata Laluan</p>
             </div>
             <div id = "div2">
               <p><input id = "inputpin" type="password" name="password" placeholder="4 digit" maxlength="4" size="30"
               onkeypress="return event.charCode>= 48 && event.charCode <=57" required></p>
             </div>

             <br>
             <br>
             <br>
             <div id = "div1">
               <button id = "new1" type="submit">DAFTAR MASUK</button>
               <button id = "new1" type="reset" >RESET</button>
             </div>
             <h5>*Jika belum mendaftar, <a href="daftar_baru.php"> Daftar di sini.*   </h5>
             <br>
            </form>
           </td>
         </tr>
       </table>
     </center>
     <center style="margin-right:20px;">
     <font style = "font-size:13px"> COPYRIGHT &copy; 2021 </font>
     </center>
     <br>
     <br>
   </body>
 </html>

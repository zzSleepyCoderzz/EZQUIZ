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

       p{
         font-family: "DIN Next LT Pro Light";
         font-size: 25px;
         margin : 0;
         padding-right: 30px;
       }

       #p1{
         font-family: "Feather Bold";
         font-size: 40px;
         margin-top: 20px;
         margin-bottom: 20px;
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

       #div3{
         padding-left: 300px;
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
         margin-left: 78px;
       }

       #button1:hover{
         cursor: pointer;
         background-color: white;
         color: black;
       }

       #delete{
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

       #delete:hover{
         cursor: pointer;
         background-color: white;
         color: black;
         box-shadow: none;
       }

       b{
         font-family: "DIN Next LT Pro Bold";
       }

       hr{
         width : 920px;
       }

     </style>
     <center>
       <p id = "p1">SENARAI SUBJEK BERDAFTAR
         <div>
           <a href = "subjek_daftar.php">
               <button id = "button1">Daftar Subjek
               </button>
           </a>
         </div>
       </p>
     </center>
     <br>
     <main>
       <table width = "60%" border = "0" align = "center" style = "font-size:16px;font-family:DIN Next LT Pro Light;">
         <tr>
           <td width = "5%"><b> Bil. </b></td>
           <td width = "75%"><b> Nama Subjek </b></td>
           <td width = "15%"><b> Tindakan </b></td>
         </tr>
         <hr>

         <?php
         $no = 1;
         $data1 = mysqli_query($hubung, "SELECT * FROM subjek
         ORDER BY subjek ASC");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $info1['subjek']; ?></td>
            <td>
              <a href = "hapus_subjek.php?idsubjek=<?php echo $info1['idsubjek']; ?>"
                onclick="return confirm ('Awas!!!, Topik, Soalan dan jawapan akan dihapuskan. Anda Pasti?')">
              <button id = "delete"> Hapus </button>
              </a>
            </td>
          </tr>
          <?php $no++; }?>
       </table>
     </main>
     <center>
       <font style = "font-size:14px">
         *Senarai Tamat*
         <br>Jumlah Rekod : <?php echo $no-1; ?></br>
       </font>
    </center>
    <center style="margin-top:60px;">
      <?php include 'footer.php'; ?>
    <center>
   </body>
 </html>

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
         width : 1070px;
       }

       #td1{
         font-family: "DIN Next LT Pro Light";
         margin: 0;
         font-size: 16px;
       }

     </style>
     <center><p id = "p1"> SENARAI PELAJAR BERDAFTAR</p></center>
     <br>
     <main>
       <table width = "70%" border = "0" align = "center" style = 'font-size:16px'>
         <tr>
           <td width = "5%"><b> Bil. </b></td>
           <td width = "15%"><b> ID Pelajar </b></td>
           <td width = "20%"><b> Password </b></td>
           <td width = "30%"><b> Nama Pelajar </b></td>
           <td width = "10%"><b> Jantina </b></td>
           <td width = "10%"><b> Tindakan </b></td>
         </tr>
         <hr>
         <?php
         $no = 1;
         $data1 = mysqli_query($hubung , "SELECT * FROM pengguna WHERE aras = 'PELAJAR' ORDER BY nama ASC");
         while ($info1 = mysqli_fetch_array($data1)) {
          ?>
          <tr>
            <td><p id = "td1"> <?php echo $no; ?> </p></td>
            <td><p id = "td1"> <?php echo $info1['idpengguna']; ?></p></td>
            <td><p id = "td1"> <?php echo $info1['password']; ?></p></td>
            <td><p id = "td1"> <?php echo $info1['nama']; ?></p></td>
            <td><p id = "td1"> <?php echo $info1['jantina']; ?></p></td>
            <td><a href = "hapus_pelajar.php?idpengguna=<?php echo preg_replace('/[\x80-\xFF]/', '', $info1['idpengguna']);?>" onclick="return confirm ('AWAS!, Semua rekod yang berkaitan akan dihapuskan , Anda Pasti?')">
            <button id = "delete">HAPUS</button></td>
          </tr>
          <?php $no++ ; }?>
       </table>
     </main>
     <br>
     <br>
     <center> <font style = 'font-size:14px'> *SENARAI TAMAT* <br> Jumlah Rekod : <?php echo $no-1;?> </font> </center>
     <center style="margin-top:60px;">
       <?php include 'footer.php'; ?>
     <center>
   </body>
 </html>

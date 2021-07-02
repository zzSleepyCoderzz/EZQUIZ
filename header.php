<?php
include 'sambung.php';
?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr" style="padding: 0;">
   <head >
     <meta charset="utf-8">
     <title>EZQUIZ</title>
   </head>
     <body  style="margin : 0;" >
       <style media="screen">
       #changecolor {
         background: linear-gradient(to bottom right, pink, blue,lightblue);
         box-shadow: none;
         width: 150px;
         height: 50px;
         border-radius: 20px;
         margin-top: 20px;
         margin-right: 20px;
         float: right;
         width: 90px;
         padding-left: 3px;
         padding-right: 3px;
         border : none;
         color: white;
         font-family: "Feather Bold";
       }
       #changecolor:hover{
         box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
         cursor: pointer;
       }

       #header1{
         height:200px;
         background-color: #32CD32;
       }

       #logo{
         float: left;
         margin-left: 20px;
       }

       </style>

       <center id = "header1">
         <button id = "changecolor"  onclick="color()"> Warna</button>
         <br>
         <img id = "logo" src="logo.png" alt="logo" width = "100px" height="60px">
         <br>
         <p>
          <font style="margin-left:20px;" size = "+5" color = "white" font face = "Feather Bold" >
            <?php echo $nama_sistem; ?>
          </font>
        </p>
        <br>
       </center>
      </body>
 </html>

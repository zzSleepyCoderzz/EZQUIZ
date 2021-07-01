<?php include 'sambung.php'; ?>

<center>
  <style media="screen">
    .menu1button:hover{
      cursor: pointer;
      background-color: lightblue;
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
    }
    .menu1button{
      background-color:  #32CD32;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      font-family: "Feather Bold";
      display: inline-block;
      font-size: 16px;
      border-radius: 30px;
    }
    div{
      background-color: #ECEBE4;
      justify-content: space-between;
      display: flex;
      width: 35%;
    }
  </style>
  <div>
    <a href="index.php"><button class = "menu1button">HOME</button></a>
    <a href="login.php"><button class = "menu1button">DAFTAR MASUK</button></a>
    <a href="daftar_baru.php"><button class = "menu1button">DAFTAR BARU</button></a>
  </div>
</center>

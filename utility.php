<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <script>
  var fontSize = 1;
  function zoomIn(){
    fontSize += 0.1;
    document.body.style.fontSize = fontSize + "em";
  }

  function zoomOut(){
    fontSize -= 0.1;
    document.body.style.fontSize = fontSize + "em";
  }
  </script>

  <center>
    <input type="button" name="" value="++" onclick="zoomIn()">
    <input type="button" name="" value="--" onclick="zoomOut()">
    <button id = "color"> Warna </button>
  </center>

  <script>
  document.getElementsById('color').onclick = changeColor();
  var currentColor = "red";
  function changeColor(){
    if(currentColor == "red"){
      document.body.style.color = "blue";
      currentColor = "blue";
    }
    else {
      document.body.style.color = "red";
      currentColor = "red";
    }
  }
  </script>

  </body>
</html>

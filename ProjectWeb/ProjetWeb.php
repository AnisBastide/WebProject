<?php 
  require "plugin/connect.php";

?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href="effect.css"> 
    <link rel='stylesheet' href="style.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'plugin/header.php';?>
<video autoplay loop>
  <source src="video/bg.mp4" type="video/mp4">
  <source src="video/bg.webm" type="video/webm">
</video>
<div id="logo">
<img src="img/owlogo.png">
</div>
<?php
               $connect = new connect('root','root','web_project','mysql','localhost');
               echo '</br>';
               
               $connect->getAllRows('characters',"*");
               
               
               ?>
<?php include 'plugin/footer.php';?>
</body>
</html>
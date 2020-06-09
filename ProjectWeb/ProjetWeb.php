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
<?php
               $connect = new connect('root','root','web_project','mysql','localhost');
               echo '</br>';

               $connect->getAllRows('characters',"*");

               $connect->getImage('Ana');
               $connect->getImage('Bastion');


               ?>
<?php include 'plugin/footer.php';?>
</body>
</html>

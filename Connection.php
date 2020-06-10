<?php require "Plugin/connect.php"; ?>
<?php require "Plugin/autoform.php"; ?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include "Plugin/header.php" ;  ?>
<form method="POST" action="#">
<?php
               $connect = new connect('root','root','web_project','mysql','localhost');
               echo '</br>';
               
               echo 'Inscrivez vous:';
               echo '</br>';
               $form = new autoform;
               $form->getInputText("name","Votre nom:");
               echo '</br>';
               $form->getInputText("mail","Votre mail:");
               echo '</br>';
               $form->getInputPassword("user_password","Votre mot de passe:","8");
               echo '</br>';
               $form->getInputSubmit("Valider","submit");

               $connect->getInsert("user",array('NULL',"'".$_POST["name"]."'","'".$_POST["user_password"]."'","'".$_POST["mail"]."'"));
             
               
               ?>
               </form>
<?php include "Plugin/footer.php";   ?>
</body>
</html>
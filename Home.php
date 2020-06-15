<?php require "Plugin/connect.php"; ?>
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
<?php
session_start();
if (isset($_GET['deconnexion'])) {
    if ($_GET['deconnexion'] == true) {
        session_unset();
        header("location:Home.php");
    }
}
?>
<?php include "Plugin/footer.php";   ?>
</body>
</html>

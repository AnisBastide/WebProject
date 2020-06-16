<html>
<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Web Project - Profil</title>
</head>

<body class="profilbody">

    <div><a class="button" href="News.php"> Back to home</a></div>

    <div id="container">


        <form method="POST">
            <h1>Profil</h1>
            <div class="profilrow">
                <?php
                $db_username = 'root';
                $db_password = 'root';
                $db_name     = 'web_project';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password, $db_name);
                function getImg($db)
                {
                    $requete = 'SELECT img FROM utilisateur WHERE nom_utilisateur="' . $_SESSION["username"] . '"';
                    $exec_requete = mysqli_query($db, $requete);
                    $reponse      = mysqli_fetch_array($exec_requete);
                    $idimg = $reponse['img'];
                    return $idimg;
                }
                $img = getImg($db);
                if ($img == NULL) {
                    $img = 0;
                }
                echo '<div style=" background-position: 50% 15%;
                width: 150px;
                height: 150px;
                border-radius: 100%;
                background-image: url(img/characters/' . $img . '.png);"></div>';


                ?>

                <div class="profilcolumn">


                    <h2><?php echo $_SESSION["username"] ?></h2> </br>
                </div>
            </div>
            </br>


            <label><b>Change username</b></label>
            <input type="text" placeholder="Enter your new username" name="new_username" >

            <label><b>Change password</b></label>
            <input type="password" placeholder="Enter your new password" name="new_pw" >


           

            <!-- <select name="avatarlist">
             
            </select> -->

            <input type="submit" id='submit' name="button" value='EXECUTE'>







        </form>
<?php

// connexion à la base de données
$db_username = 'root';
$db_password = 'root';
$db_name     = 'web_project';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
or die('could not connect to database');

// on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
// pour éliminer toute attaque de type injection SQL et XSS
$username = mysqli_real_escape_string($db,htmlspecialchars($_POST['new_username']));
$password = mysqli_real_escape_string($db,htmlspecialchars($_POST['new_pw']));
if($_GET['password_changed']){
    echo "<div class='success'>password sucessfully changed</div>";
}
if(isset($_POST['button'])){
    if($username!==""){
        $requete = "UPDATE utilisateur
        SET nom_utilisateur='".$username."'
        WHERE nom_utilisateur= '".$_SESSION['username']."';";
        $exec_requete = mysqli_query($db,$requete);
        $_SESSION['username']=$username;
        header("location:Profil.php");

    }
    if($password!==""){
        $requete = "UPDATE utilisateur
        SET mot_de_passe='".$password."'
        WHERE nom_utilisateur= '".$_SESSION['username']."';";
        $exec_requete = mysqli_query($db,$requete);
        header("location:Profil.php?password_changed=true");


    }

}
?>

    </div>

</body>

</html>
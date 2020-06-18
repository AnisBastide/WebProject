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
                $db_username = 'anis';
                $db_password = 'anis';
                $db_name     = 'web_project';
                $db_host     = '217.160.241.170';
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
            <label><b>Change profil picture</b></label></br></br>
            <select name="profil_picture">
                <?php

                function getCharactersName($db)
                {
                    $boolean = true;
                    $array = array();
                    $requete = "SELECT name FROM characters";
                    $exec_requete = mysqli_query($db, $requete);
                    while ($boolean) {
                        $stockage = $exec_requete->fetch_row();
                        if ($stockage !== NULL) {
                            $array[] = $stockage;
                        }
                        else {
                            $boolean = false;
                        }
                    }

                    foreach ($array as $array2) {
                        foreach ($array2 as $name) {
                            echo '<option>' . $name . '</option>';
                        }
                    }
                }
                getCharactersName($db);






                ?>
            </select></br></br>


            <label><b>Change username</b></label>
            <input type="text" placeholder="Enter your new username" name="new_username">

            <label><b>Change password</b></label>
            <input type="password" placeholder="Enter your new password" name="new_pw">







            <!-- <select name="avatarlist">
             
            </select> -->

            <input type="submit" id='submit' name="button" value='EXECUTE'>







        </form>
<?php
// connexion à la base de données


// on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
// pour éliminer toute attaque de type injection SQL et XSS
$username = mysqli_real_escape_string($db, htmlspecialchars($_POST['new_username']));
$password = mysqli_real_escape_string($db, htmlspecialchars($_POST['new_pw']));
if ($_GET['password_changed']) {
    echo "<div class='success'>password sucessfully changed</div>";
}
if (isset($_POST['button'])) {
    if ($username !== "") {
        $requete = "UPDATE utilisateur
        SET nom_utilisateur='" . $username . "'
        WHERE nom_utilisateur= '" . $_SESSION['username'] . "';";
        $exec_requete = mysqli_query($db, $requete);
        $_SESSION['username'] = $username;
        header("location:Profil.php");
    }
    if ($password !== "") {
        $requete = "UPDATE utilisateur
        SET mot_de_passe='" . $password . "'
        WHERE nom_utilisateur= '" . $_SESSION['username'] . "';";
        $exec_requete = mysqli_query($db, $requete);
        header("location:Profil.php?password_changed=true");
    }
    $profil_img=$_POST["profil_picture"];
    if($profil_img !==""){
        $requete ="SELECT id FROM characters WHERE name='".$profil_img."'";
        $exec_requete = mysqli_query($db, $requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $stock=$reponse['id'];
        $requete2 ="UPDATE utilisateur SET img='".$stock."' WHERE nom_utilisateur='". $_SESSION['username'] . "'";
        $exec_requete = mysqli_query($db, $requete2);
        header("location:Profil.php");





    }
}
?>


    </div>

</body>

</html>
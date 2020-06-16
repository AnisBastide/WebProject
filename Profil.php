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
            <input type="text" placeholder="Enter your new username" name="new_username" required>

            <label><b>Change password</b></label>
            <input type="text" placeholder="Enter your new password" name="new_pw" required>


           

            <!-- <select name="avatarlist">
             
            </select> -->

            <input type="submit" id='submit' name="button" value='EXECUTE'>







        </form>


    </div>

</body>

</html>
<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Web Project - Connection</title>
</head>

<body>
  
        <div id="container">
            <!-- zone de connexion -->

            <form action="Plugin/verification.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>

            </form>
            <form action="Plugin/register.php" method="POST">
                <h1>Inscription</h1>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='REGISTER'>
                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe non valide</p>";
                }
                ?>



            </form>
        </div>
    
</body>

</html>
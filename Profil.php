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
                <div class="img_profil"></div>
                <div class="profilcolumn">
                    

                    <h2><?php echo $_SESSION["username"] ?></h2> </br>
                </div>
            </div>
</br>


            <label><b>Change username</b></label>
            <input type="text" placeholder="Enter your new username" name="new_username" required>

            <label><b>Change password</b></label>
            <input type="text" placeholder="Enter your new password" name="new_pw" required>

            <input type="submit" id='submit' name="button" value='EXECUTE'>







        </form>


    </div>

</body>

</html>
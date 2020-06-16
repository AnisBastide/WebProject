<html>

<head>
    <meta charset="utf-8">
    <!-- importer le fichier de style -->
    <link rel="stylesheet" href="style2.css" media="screen" type="text/css" />
    <title>Web Project - Connection</title>
</head>

<body>
<?php
if($_GET['register']){
    echo "Your account is sucessfully created. Now you need to log in.";
}
?>
<div><a class="button" href="News.php"> Back to home</a></div>
  
        <div id="container">
            <!-- zone de connexion -->

            <form action="Plugin/verification.php" method="POST">
                <h1>Connection</h1>

                <label><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter password" name="password" required>

                <input type="submit" id='submit' value='LOGIN'>
                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Username or password incorrect</p>";
                }
                ?>

            </form>
            <form action="Plugin/register.php" method="POST">
                <h1>Register</h1>

                <label><b>Username</b></label>
                <input type="text" placeholder="Enter username" name="username" required>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter password" name="password" required>

                <input type="submit" id='submit' value='REGISTER'>
                <?php
                if (isset($_GET['erreur'])) {
                    $err = $_GET['erreur'];
                    if ($err == 1 || $err == 2)
                        echo "<p style='color:red'>Username or password not valid</p>";
                }
                ?>



            </form>
        </div>
    
</body>

</html>
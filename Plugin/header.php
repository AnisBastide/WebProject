<header>
    <?php
    session_start();
    ?>
<nav>
<div><a class="nav" href="./News.php"><b>News</b></a></div>
<div><a class="nav"href="./Characters.php"> <b>Characters & Story</b></a></div>
<div><a class="nav"href="./Conception.php"> <b>Conception</b></a></div>
<div class="dropdown"><a class="nav" href="./Us.php"><b>À propos de nous</b></a>
    <div class="dropdown-child">
        <a>L'itescia</a>
        <a>La Coding Factory</a>
        <a>Nous</a>
    </div>
</div>
    <?php
    if (!$_SESSION['username']
    ){
        echo '<div><a class="nav" href="./Connection.php"><b>Connection/Inscription</b></a></div>';
    }
    else{
        echo '<form method=post><div class="dropdown"><a class="nav"><b>'.$_SESSION['username'] .'</b></a><div class="dropdown-child"><a><button name="disconnect" type="submit">Disconnect</button></a></div></div></form>';
    }


    if(isset($_POST['disconnect'])){
        header("location:./News.php?deconnexion='true'");
    }
    ?>
</nav>
</header>
<header>
<nav>
<div><a class="nav" href="./NewWebProject.php">Accueil</a></div>
<div class="dropdown"><a class="nav" href="./Us.php">À propos de nous</a><div class="dropdown-child"><a>L'itescia</a><a>La Coding Factory</a><a>Nous</a></div></div>
    <?php
    if (!$_SESSION['username']
    ){
        echo '<div><a class="nav" href="./Connection.php">Connection</a></div>';
    }
    else{
        echo '<div><a class="nav">'.$_SESSION['username'] .'</a></div>';
    }
    ?>

</nav>
</header>
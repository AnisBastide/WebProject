<header>
    <?php
    session_start();
    ?>
    <nav>
        <div><a class="nav" href="./News.php"><b>News</b></a></div>
        <div><a class="nav" href="./Characters.php"> <b>Characters & Story</b></a></div>
        <div><a class="nav" href="./Conception.php"> <b>Conception</b></a></div>
        <div class="dropdown"><a class="nav" href="./Us.php"><b>About us</b></a>
            <div class="dropdown-child">
                <a href="./Us.php#Itescia">Itescia</a>
                <a href="./Us.php#CodingFactory">Coding Factory</a>
                <a href="./Us.php#Nous">Us</a>
            </div>
        </div>
        <?php
        if (!$_SESSION['username']) {
            echo '<div><a class="nav" href="./Connection.php"><b>Connection/Register</b></a></div>';
        } else {
            echo '<form method=post>
                        <div class="dropdown connect">
                            <a class="nav2"><b>' . $_SESSION['username'] . '</b></a>
                            <div class="dropdown-child2">
                                <a> <button class="button_disco test"  name="disconnect" type="submit">Disconnect</button></a>
                                <a class="test" href="./Contact.php">Contact Us</a>
                                <a class="test" href="./Profil.php">Profil</a>
                            </div>
                        </div>
                   </form>';
        }


        if (isset($_POST['disconnect'])) {
            header("location:./News.php?deconnexion='true'");
        }
        ?>
    </nav>
</header>
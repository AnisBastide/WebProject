<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web Project - Characters & Story</title>
    </head>

    <body>
        <?php include "Plugin/header.php";  ?>
        <img class="division" src="img/characters.png">
        <?php
        $db_username = 'anis';
        $db_password = 'anis';
        $db_name     = 'web_project';
        $db_host     = '217.160.241.170';
        $db = mysqli_connect($db_host, $db_username, $db_password, $db_name);


        function getName($db, $id)
        {
            $requete = "SELECT name FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $name = $reponse['name'];
            return $name;
        }
        function getClass($db, $id)
        {
            $requete = "SELECT class FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $class = $reponse['class'];
            return $class;
        }
        function getFaction($db, $id)
        {
            $requete = "SELECT faction FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $faction = $reponse['faction'];
            return $faction;
        }
        function getDamage($db, $id)
        {
            $requete = "SELECT damage FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $dmg = $reponse['damage'];
            return $dmg;
        }
        function getDefense($db, $id)
        {
            $requete = "SELECT defense FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $dfs = $reponse['defense'];
            return $dfs;
        }
        function getSpeed($db, $id)
        {
            $requete = "SELECT speed FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $spd = $reponse['speed'];
            return $spd;
        }

        function getAbility1($db, $id)
        {
            $requete = "SELECT ability_1 FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $ab1 = $reponse['ability_1'];
            return $ab1;
        }
        function getAbility2($db, $id)
        {
            $requete = "SELECT ability_2 FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $ab2 = $reponse['ability_2'];
            return $ab2;
        }
        function getUltimate($db, $id)
        {
            $requete = "SELECT ultimate FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $ult = $reponse['ultimate'];
            return $ult;
        }
        function getStory($db, $id)
        {
            $requete = "SELECT story FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $story = $reponse['story'];
            return $story;
        }
        function getDescAb1($db, $id)
        {
            $requete = "SELECT desc_ab1 FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $dab1 = $reponse['desc_ab1'];
            return $dab1;
        }
        function getDescAb2($db, $id)
        {
            $requete = "SELECT desc_ab2 FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $dab2 = $reponse['desc_ab2'];
            return $dab2;
        }
        function getDescUlt($db, $id)
        {
            $requete = "SELECT desc_ult FROM characters WHERE id=" . $id;
            $exec_requete = mysqli_query($db, $requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $dabu = $reponse['desc_ult'];
            return $dabu;
        }
        function generatePageById($db)
        {
            $boolean = true;
            $array = array();
            $requete = "SELECT id FROM characters";
            $exec_requete = mysqli_query($db, $requete);
            while ($boolean) {
                $stockage = $exec_requete->fetch_row();
                if ($stockage !== NULL) {
                    $array[] = $stockage;
                } else {
                    $boolean = false;
                }
            }
            foreach ($array as $arrayid) {
                foreach ($arrayid as $idvalue) {
                    if ($idvalue % 2 == 0) {
                        sendRight($db, $idvalue);
                    } else {
                        sendLeft($db, $idvalue);
                    }
                }
            }
        }
        function sendLeft($db, $id)
        {
            echo '
<div class="characters_container">
    <div>
        <img width="261" height="392" style="border-radius:20px;" class="img_responsive" src="img/characters/' . $id . '.png">
    </div>
    <div class="characters_column">

        <div class="characters_row">
            <div class="left">
                <span class="style">Name: </span>' . getName($db, $id) . '</br>
                <span class="style">Class: </span>' . getClass($db, $id) . '</br>
                <span class="style">Faction: </span>' . getFaction($db, $id) . '</br>
            </div>

            <div>
            <span class="style"> Damage: </span>' . getDamage($db, $id) . '</br>
            <span class="style">Speed: </span>' . getSpeed($db, $id) . '</br>
            <span class="style"> Defense: </span>' . getDefense($db, $id) . '</br>
            </div>
        </div>
        </br>

        <div>
        <span class="style"> Story:</span></br>
           <span>' . getStory($db, $id) . '</span>
        </div>
        <hr>
        <div>
            <table>
                <tr><td><span class="style">Ability 1</span></td><td>' . getAbility1($db, $id) . '</td><td>' . getDescAb1($db, $id) . ' </td></tr>
                <tr><td><span class="style">Ability 2</span></td><td>' . getAbility2($db, $id) . '</td><td>' . getDescAb2($db, $id) . '</td></tr>
                <tr><td><span class="style">Ultimate</span></td><td>' . getUltimate($db, $id) . '</td><td>' . getDescUlt($db, $id) . ' </td></tr>
            </table>
        </div>
    </div>
</div>';
        }
        function sendRight($db, $id)
        {
            echo '<div class="characters_container">
            
    <div class="characters_column">

    <div class="characters_row">
        <div class="left">
            <span class="style">Name: </span>' . getName($db, $id) . '</br>
            <span class="style">Class: </span>' . getClass($db, $id) . '</br>
            <span class="style">Faction: </span>' . getFaction($db, $id) . '</br>
        </div>

        <div>
        <span class="style"> Damage: </span>' . getDamage($db, $id) . '</br>
        <span class="style">Speed: </span>' . getSpeed($db, $id) . '</br>
        <span class="style"> Defense: </span>' . getDefense($db, $id) . '</br>
        </div>
    </div>
    </br>

    <div>
    <span class="style"> Story:</span></br>
       <span>' . getStory($db, $id) . '</span>
    </div>
    <hr>
    <div>
        <table>
            <tr><td><span class="style">Ability 1</span></td><td>' . getAbility1($db, $id) . '</td><td>' . getDescAb1($db, $id) . ' </td></tr>
            <tr><td><span class="style">Ability 2</span></td><td>' . getAbility2($db, $id) . '</td><td>' . getDescAb2($db, $id) . '</td></tr>
            <tr><td><span class="style">Ultimate</span></td><td>' . getUltimate($db, $id) . '</td><td>' . getDescUlt($db, $id) . ' </td></tr>
        </table>
    </div>
</div>
    <div>
        <img width="261" height="392" style="border-radius:20px;" class="img_responsive" src="img/characters/' . $id . '.png">
    </div>
</div>';
        }
        generatePageById($db);

        ?>
        </div>
        <img id="storypart" class="division" src="img/story.png">
        <div class="story">
            <h1>The World of Daear</h1>
            <img src="img/map.png">
            <p>Daear, the land on which our history takes place, is a fantasy world made up of several
                civilized races such as the classic Men, Dwarves and Elves. The events on which the story will
                be based are those of the return of Kraynord, a powerful sorcerer who disappeared thousands
                of years ago.
                Kraynord was a powerful sorcerer at the head of the Temples of the Twenty, an alliance
                of the most powerful masters of magic of the time. The purpose of this alliance was to win
                the ultimate victory against the Diafols, demonic beings in perpetual war with all other
                races. The Diafols were such a great threat that all nations united in an attempt to destroy
                them once and for all. With the help of the Temples of the Twenty, the demons were defeated
                and peace was established. But that victory came at a price. Kraynord was sacrificed
                in battle by his brothers in arms in a moment of defeat. His power was so great and
                his confusion so great that his body perished but not his spirit. The latter, fractured
                in two: one part freed itself from its anger by taking away its reason and its love,
                the other part was consumed by incomprehension and revenge and became Krayn, the avatar
                of revenge.
                However, neither of these two parts of Kraynord's spirit made itself known to the world.
                Kraynord's body was taken to the depths of the present Sï lands, which was then a vast
                forest as untamed as it was indomitable. Kraynord's reasoned mind manages to reincarnate
                from his lifeless body deep in the forest. Krayn, on the other hand, was forced to wander
                indefinitely in this land he hated so much.

                All these events date back to a very distant time. Only old books mention them and many have
                become more legend than fact. Today, Kraynord has become the Timeless Tree and has given
                birth to the Sï race, which he nourishes with his magic. Krayn, on the other hand, put a
                plan into action. For hundreds of years he waited for the races to develop, expand and
                increasingly forget their past. And then he set his heart on the Elves. Slowly, he began
                to corrupt the weakest minds in their capital city and, for years, he had them build a
                huge magic bomb hidden underneath the immense city. Once the bomb was ready, he ordered
                all but one of his corrupts to leave town. The latter activated the bomb and the
                disaster began. The entire sublime Elven capital was instantly razed to the ground.
                Krayn used the power released by the bomb to reincarnate himself in the body of the
                person who had embodied the bomb, thus preventing him from being disintegrated (at least
                for his body). Then, with that same power, he raised all the dead of the capital and
                raised in less than a day a huge army of death, ready to quench Krayn's vengeance.
                With the help of his corrupt spared, his immense power and his brand new army, his
                conquest of chaos began. The Elves, caught unawares and deprived of their high command,
                lost almost all of their territory. In the face of this new and immense threat, Elves,
                Dwarves and Men once again joined forces to face the one who had once fought at their side.</p>
        </div>

        <?php include "Plugin/footer.php";   ?>
    </body>

    </html>
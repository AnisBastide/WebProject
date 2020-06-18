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
        $db_username = 'root';
        $db_password = 'root';
        $db_name     = 'web_project';
        $db_host     = 'localhost';
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
            <h1>Nom de la map</h1>
            <img src="img/map.png">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras adipiscing enim eu turpis egestas pretium aenean. Ultrices sagittis orci a scelerisque purus semper eget duis. Augue mauris augue neque gravida in fermentum et sollicitudin. Ut morbi tincidunt augue interdum velit euismod. Faucibus in ornare quam viverra orci sagittis eu. Lectus proin nibh nisl condimentum id venenatis a condimentum. Diam quam nulla porttitor massa id. Ligula ullamcorper malesuada proin libero nunc consequat interdum varius sit. Dignissim enim sit amet venenatis. Felis imperdiet proin fermentum leo vel orci porta. Purus sit amet volutpat consequat mauris nunc congue nisi vitae.

                Semper viverra nam libero justo. At auctor urna nunc id. Tempus iaculis urna id volutpat. Vestibulum lorem sed risus ultricies tristique nulla aliquet enim tortor. Scelerisque purus semper eget duis at tellus at urna. Enim facilisis gravida neque convallis a cras. Dapibus ultrices in iaculis nunc sed augue. Nibh tellus molestie nunc non blandit massa enim nec dui. Magna sit amet purus gravida quis. Mi ipsum faucibus vitae aliquet nec ullamcorper sit. Feugiat nibh sed pulvinar proin gravida hendrerit. Id donec ultrices tincidunt arcu. Vulputate ut pharetra sit amet aliquam id diam. Vitae sapien pellentesque habitant morbi tristique senectus et netus. Lacus viverra vitae congue eu consequat ac.

                Mi eget mauris pharetra et ultrices. Pretium fusce id velit ut tortor pretium viverra suspendisse potenti. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. Lectus quam id leo in vitae turpis massa. Pellentesque habitant morbi tristique senectus. Dignissim diam quis enim lobortis scelerisque fermentum. Est ullamcorper eget nulla facilisi etiam. Volutpat sed cras ornare arcu dui vivamus. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Sapien pellentesque habitant morbi tristique. Tempus quam pellentesque nec nam aliquam sem. Tincidunt tortor aliquam nulla facilisi cras fermentum odio. Quisque egestas diam in arcu. Porttitor lacus luctus accumsan tortor posuere. Sed vulputate mi sit amet mauris commodo quis imperdiet massa. Nec nam aliquam sem et. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Sagittis eu volutpat odio facilisis mauris. Habitasse platea dictumst quisque sagittis purus sit amet volutpat. Ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget.</p>
        </div>

        <?php include "Plugin/footer.php";   ?>
    </body>

    </html>
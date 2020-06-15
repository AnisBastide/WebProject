<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php include "Plugin/header.php";  ?>
        <img class="division" src="img/characters.png">
        <?php
$db_username = 'root';
$db_password = 'root';
$db_name     = 'web_project';
$db_host     = 'localhost';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);


function getName($db,$id)
{
    $requete = "SELECT name FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $name=$reponse['name'];
        return $name;
        
}
function getClass($db,$id)
{
    $requete = "SELECT class FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $class=$reponse['class'];
        return $class;
        
}
function getFaction($db,$id)
{
    $requete = "SELECT faction FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $faction=$reponse['faction'];
        return $faction;
        
}
function getDamage($db,$id)
{
    $requete = "SELECT damage FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $dmg=$reponse['damage'];
        return $dmg;
        
}
function getDefense($db,$id)
{
    $requete = "SELECT defense FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $dfs=$reponse['defense'];
        return $dfs;
        
}
function getSpeed($db,$id)
{
    $requete = "SELECT speed FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $spd=$reponse['speed'];
        return $spd;
        
}

function getAbility1($db,$id)
{
    $requete = "SELECT ability_1 FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $ab1=$reponse['ability_1'];
        return $ab1;
        
}
function getAbility2($db,$id)
{
    $requete = "SELECT ability_2 FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $ab2=$reponse['ability_2'];
        return $ab2;
        
}
function getUltimate($db,$id)
{
    $requete = "SELECT ultimate FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $ult=$reponse['ultimate'];
        return $ult;
        
}
function getStory($db,$id)
{
    $requete = "SELECT story FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $story=$reponse['story'];
        return $story;
        
}
function getDescAb1($db,$id)
{
    $requete = "SELECT desc_ab1 FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $dab1=$reponse['desc_ab1'];
        return $dab1;
        
}
function getDescAb2($db,$id)
{
    $requete = "SELECT desc_ab2 FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $dab2=$reponse['desc_ab2'];
        return $dab2;
        
}
function getDescUlt($db,$id)
{
    $requete = "SELECT desc_ult FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $dabu=$reponse['desc_ult'];
        return $dabu;
        
}
function generatePageById($db){
    $boolean=true;
    $array=array();
    $requete = "SELECT id FROM characters";
    $exec_requete = mysqli_query($db,$requete);
    while($boolean){
        $stockage=$exec_requete->fetch_row();
        if($stockage!==NULL){
            $array[]=$stockage;
        }
        else{
            $boolean=false;
        }
    }
    foreach($array as $arrayid){
        foreach($arrayid as $idvalue){
            if ($idvalue%2==0){
                sendRight($db,$idvalue);
            }
            else{
               sendLeft($db,$idvalue); 
            }
        }
       
    }  
}
function sendLeft($db,$id){
echo '
<div class="characters_container">
    <div>
        <img class="img_responsive" src="img/characters/'.$id.'.png">
    </div>
    <div class="characters_column">

        <div class="characters_row">
            <div class="left">
                <b>Name:</b>'.getName($db,$id).'</br>
                <b>Class:</b>'.getClass($db,$id).'</br>
                <b>Faction:</b>'.getFaction($db,$id).'</br>
            </div>

            <div>
               <b> Damage:</b>'.getDamage($db,$id).'</br>
               <b>Speed:</b>'.getSpeed($db,$id).'</br>
               <b> Defense:</b>'.getDefense($db,$id).'</br>
            </div>
        </div>
        </br>

        <div>
           <b> Story:</b></br>
           <span>'.getStory($db,$id).'</span>
        </div>
        <hr>
        <div>
            <table>
                <tr><td><b>Ability 1</b></td><td>'.getAbility1($db,$id).'</td><td>'.getDescAb1($db,$id).' </td></tr>
                <tr><td><b>Ability 2</b></td><td>'.getAbility2($db,$id).'</td><td>'.getDescAb2($db,$id).'</td></tr>
                <tr><td><b>Ultimate</b></td><td>'.getUltimate($db,$id).'</td><td>'.getDescUlt($db,$id).' </td></tr>
            </table>
        </div>
    </div>
</div>';

}
function sendRight($db,$id){
    echo '<div class="characters_container">
            
    <div class="characters_column">

        <div class="characters_row">
        <div class="left">
        <b>Name:</b>'.getName($db,$id).'</br>
        <b> Class:</b>'.getClass($db,$id).'</br>
        <b>Faction:</b>'.getFaction($db,$id).'</br>
    </div>

    <div>
       <b> Damage:</b>'.getDamage($db,$id).'</br>
       <b>Speed:</b>'.getSpeed($db,$id).'</br>
       <b> Defense:</b>'.getDefense($db,$id).'</br>
    </div>
        </div>
        </br>

        <div>
           <b> Story:</b></br>
           <span>'.getStory($db,$id).'</span>
        </div>
        <hr>
        <div>
            <table>
            <tr><td><b>Ability 1</b></td><td>'.getAbility1($db,$id).'</td><td>'.getDescAb1($db,$id).' </td></tr>
            <tr><td><b>Ability 2</b></td><td>'.getAbility2($db,$id).'</td><td>'.getDescAb2($db,$id).'</td></tr>
            <tr><td><b>Ultimate</b></td><td>'.getUltimate($db,$id).'</td><td>'.getDescUlt($db,$id).' </td></tr>
            </table>
        </div>
    </div>
    <div>
        <img class="img_responsive" src="img/characters/'.$id.'.png">
    </div>
</div>';

}
generatePageById($db);

?>
        </div>
        <img class="division" src="img/story.png">
        
        <?php include "Plugin/footer.php";   ?>
    </body>

    </html>
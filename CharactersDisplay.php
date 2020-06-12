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
function getAbility($db,$id)
{
    $requete = "SELECT ab1 FROM characters WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $ab=$reponse['ab1'];
        return $ab;
        
}
function getId($db){
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
    $reponse  = mysqli_fetch_row($exec_requete);
    print_r($array);
    foreach($array as $id){
        foreach($id as $id2){
            if ($id2%2==0){
                sendRight($db,$id2);
            }
            else{
               sendLeft($db,$id2); 
            }
        }
       
    }  
}
function sendLeft($db,$id){
echo '
<div class="characters_container">
    <div>
        <img class="img_responsive" src="img/characters/alwin.png">
    </div>
    <div class="characters_column">

        <div class="characters_row">
            <div class="left">
                <b>Name:'.getName($db,$id).'</br>
                Class:'.getClass($db,$id).'</br>
                Faction:'.getFaction($db,$id).'</b></br>
            </div>

            <div>
               <b> Damage:'.getDamage($db,$id).'</br>
                Speed:'.getDamage($db,$id).'</br>
                Defense:'.getDamage($db,$id).'</b></br>
            </div>
        </div>
        </br>

        <div>
           <b> Story:</b></br>
           <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. Nullam eget lobortis ligula, id tincidunt risus. Aliquam vel vestibulum tortor, et faucibus
            dolor. Pellentesque a molestie tellus. Nullam ut molestie odio, eget maximus dui. Proin vel urna ac erat
            pretium ultricies id non arcu. Pellentesque nec cursus enim. Pellentesque tempor blandit orci. Etiam molestie
            porta euismod. Sed finibus nisl tincidunt urna tristique malesuada.</span>
        </div>
        <hr>
        <div>
            <table>
                <tr><td><b>Ability 1</b></td><td>'.getAbility($db,$id).'</td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. 
          </td></tr>
                <tr><td><b>Ability 2</b></td><td>'.getAbility($db,$id).'</td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. </td></tr>
                <tr><td><b>Ability 3</b></td><td>'.getAbility($db,$id).'</td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. </td></tr>
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
        <b>Name:'.getName($db,$id).'</br>
        Class:'.getClass($db,$id).'</br>
        Faction:'.getFaction($db,$id).'</b></br>
    </div>

    <div>
       <b> Damage:'.getDamage($db,$id).'</br>
        Speed:'.getDamage($db,$id).'</br>
        Defense:'.getDamage($db,$id).'</b></br>
    </div>
        </div>
        </br>

        <div>
           <b> Story:</b></br>
           <span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. Nullam eget lobortis ligula, id tincidunt risus. Aliquam vel vestibulum tortor, et faucibus
            dolor. Pellentesque a molestie tellus. Nullam ut molestie odio, eget maximus dui. Proin vel urna ac erat
            pretium ultricies id non arcu. Pellentesque nec cursus enim. Pellentesque tempor blandit orci. Etiam molestie
            porta euismod. Sed finibus nisl tincidunt urna tristique malesuada.</span>
        </div>
        <hr>
        <div>
            <table>
            <tr><td><b>Ability 1</b></td><td>'.getAbility($db,$id).'</td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. 
          </td></tr>
                <tr><td><b>Ability 2</b></td><td>'.getAbility($db,$id).'</td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. </td></tr>
                <tr><td><b>Ability 3</b></td><td>'.getAbility($db,$id).'</td><td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec fringilla nunc, sed vehicula mauris.
            Pellentesque sit amet dapibus orci. Etiam vestibulum eros nisi, vitae finibus sem placerat non. Donec sed
            consequat sem. </td></tr>
            </table>
        </div>
    </div>
    <div>
        <img class="img_responsive" src="img/characters/alwin.png">
    </div>
</div>';

}
getId($db);

?>
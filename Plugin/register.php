<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'web_project';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name);



    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if ($db->connect_errno) {
        printf("Échec de la connexion : %s\n", $db->connect_error);
        exit();
    }
    if($username !== "" && $password !== "")
    {
        $requete = "INSERT INTO `utilisateur` (`nom_utilisateur`,`mot_de_passe`)  VALUES ( '".$username."','".$password."')";
        $exec_requete = mysqli_query($db,$requete);
        header('Location: ../Connection.php?register=true');


    }
    else
    {

        header('Location: header.php?erreur=2'); // utilisateur ou mot de passe vide
    }

}
else
{
   header('Location: header.php');
}
mysqli_close($db); // fermer la connexion
?>
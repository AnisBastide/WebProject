<?php require "Plugin/connect.php"; ?>
<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Web Project - News</title>
    </head>

    <body>
        <?php include "Plugin/header.php";

        session_start();
        if (isset($_GET['deconnexion'])) {
            if ($_GET['deconnexion'] == true) {
                session_unset();
                header("location:News.php");
            }
        }

        ?>
    
         <?php
$db_username = 'anis';
$db_password = 'anis';
$db_name     = 'web_project';
$db_host     = '217.160.241.170';
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name);

function getId($db){
    $boolean=true;
    $array=array();
    $requete = "SELECT id FROM news";
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
    $array=array_reverse($array);
    foreach($array as $arrayid){
        foreach($arrayid as $idvalue){
           send($db,$idvalue);
        }
       
    }  
}
function getTitle($db,$id)
{
    $requete = "SELECT title FROM news WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $title=$reponse['title'];
        return $title;
        
}
function getDesc($db,$id)
{
    $requete = "SELECT description FROM news WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $desc=$reponse['description'];
        return $desc;
        
}
function getDateNews($db,$id)
{
    $requete = "SELECT date FROM news WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $date=$reponse['date'];
        return $date;
        
}
function getAuthor($db,$id)
{
    $requete = "SELECT author FROM news WHERE id=".$id;
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $author=$reponse['author'];
        return $author;
        
}
function send($db,$id){
echo' <div class="division_news">
         <div class="img_center">
             <img src="img/news/'.$id.'.jpg" style="border-radius:20px;padding-top:10px;" height="220px" width="300px" >
         </div>
&emsp;&emsp;
         <div>
           <h1>'.getTitle($db,$id).'</h1>
           <p>'.getDesc($db,$id).'</p>
              <div class="right">
                 <h4>'.getAuthor($db,$id).', '.getDateNews($db,$id).'</h4>
              </div>
          <div>
       </div>
       </div></div>';


}
getId($db);
?>

        <?php include "Plugin/footer.php";   ?>
    </body>

    </html>
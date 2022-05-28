<?php
session_start();

//les pages qui ont besoin d'un utilisateur connecté declare une variable noAllow qui vaut true
//ça permet d'utiliser le même code pour les pages normale et celle qui ont besoin d'une connection

//au cas ou noAllow n'existe pas, on le crée
if(!isset($noAllow))
    $noAllow=false;

$connected=false;
if(isset($_SESSION["user"])){
    $connected=true;
    $user= $_SESSION["user"];
}else{
    if($noAllow){
        echo("<script>alert('Vous devez être connecté pour accéder à cette page');</script>");
        header("Location: index.php");
    }
}
?>